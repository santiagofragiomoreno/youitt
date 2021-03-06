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
    public $postal_code;
    public $province;
    public $country;
    
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            [['username','surname','address','province','country'], 'string', 'min' => 2, 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['postal_code','string','min' => 5]
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
        $client->postal_code = $this->postal_code;
        $client->province = $this->province;
        $client->country_code = $this->country;
        $client->setPassword($this->password);
        $client->generateAuthKey();
        $client->generateEmailVerificationToken();
        //$this->sendEmail($client);
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