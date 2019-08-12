<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Client;

/**
 * ClientSignup form
 */
class ClientSignupForm extends Model
{
    public $username;
    public $surname;
    public $email;
    public $password;
    public $phone;
    public $address;
    public $country_code;
    public $postal_code;
    
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            [['username','surname','surname'], 'string', 'min' => 2, 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['postal_code'], 'string', 'max' => 5],
            
            [['country_code'],'required'],
            
            ['address', 'string', 'max' => 255],
            
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    
    /**
     * Signs client up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $client = new Client();
        $client->username = $this->username;
        $client->surname = $this->surname;
        $client->phone = $this->phone;
        $client->email = $this->email;
        $client->address = $this->address;
        $client->country_code = $this->country_code;
        $client->postal_code = $this->postal_code;
        $client->setPassword($this->password);
        $client->generateAuthKey();
        $client->generateEmailVerificationToken();
        $this->sendEmail($client);
        $client->save();
        return $client;
        
    }
    
    /**
     * Sends confirmation email to client
     * @param Client $client user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($client)
    {
        return Yii::$app
        ->mailer
        ->compose(
            ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
            ['user' => $client]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}