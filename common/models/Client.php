<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $username
 * @property string $surname
 * @property string $email
 * @property string $phone
 * @property string $password_hash
 * @property int $status
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $account_confirm_token
 * @property string $created_at
 * @property string $updated_at
 * @property string $verification_token
 */
class Client extends \yii\db\ActiveRecord
{
    
    const STATUS_INACTIVE   = 0;
    const STATUS_ACTIVE     = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }
    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            [
                'class'                 => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute'    => 'created_at',
                'updatedAtAttribute'    => 'updated_at',
                'value'                 => new \yii\db\Expression('now()'),
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'surname', 'email', 'phone', 'password_hash', 'auth_key'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'surname', 'email', 'password_hash', 'password_reset_token', 'account_confirm_token'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 25],
            [['auth_key'], 'string', 'max' => 32],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'surname' => Yii::t('app', 'Surname'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'status' => Yii::t('app', 'Status'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'account_confirm_token' => Yii::t('app', 'Account Confirm Token'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
    /**
     * Automátically generates new `Admin` model.
     * {@inheritDoc}
     * @see \yii\db\BaseActiveRecord::beforeSave()
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->generateAuthKey();
                $this->generateAccountConfirmToken();
            }
            return true;
        } else {
            return false;
        }
    }
    
    /* ---------------------------------------------------------------------------------------------
     * Relations
     * ------------------------------------------------------------------------------------------ */
    
    /**
     * @inheritdoc
     * @return ClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientQuery(get_called_class());
    }
    
    
    /* ---------------------------------------------------------------------------------------------
     * Identity methods
     * ------------------------------------------------------------------------------------------ */
    
    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    
    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne ( [
            'access_token' => $token
        ] );
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getAuthKey() {
        return $this->auth_key;
    }
    
    public function validateAuthKey($auth_key) {
        return $this->auth_key === $auth_key;
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    /**
     * Generates new account confirmation token
     */
    public function generateAccountConfirmToken()
    {
        $this->account_confirm_token = Yii::$app->security->generateRandomString();
    }
    
    /**
     * Removes account confirmation token
     */
    public function removeAccountConfirmToken()
    {
        $this->account_confirm_token = null;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
    /**
     * Finds client by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }
    
}

/**
 * This is the ActiveQuery class for [[Client]].
 *
 * @see Client
 */
class ClientQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return Client[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
    
    /**
     * @inheritdoc
     * @return Client|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
