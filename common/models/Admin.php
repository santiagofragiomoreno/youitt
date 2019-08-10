<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "admin".
 *
 * @property string $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $status
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $account_confirm_token
 * @property string $created_at
 * @property string $updated_at
 *
 
 */
class Admin extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_INACTIVE   = 0;
    const STATUS_ACTIVE     = 1;
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password_hash'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['auth_key'], 'string', 'max' => 32],
            [['username', 'email', 'password_hash','password_reset_token', 'account_confirm_token'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['account_confirm_token'], 'unique'],
            [['password'], 'safe'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            			=>  Yii::t('common', 'ID'),
            'username'      			=>  Yii::t('common', 'Username'),
            'email'         			=>  Yii::t('common', 'Email'),
            'password_hash' 			=>  Yii::t('common', 'Password'),
            'status'					=>	Yii::t('common', 'Status'),
            'auth_key'      			=>  Yii::t('common', 'auth_key'),
            'password_reset_token'  	=>  Yii::t('common', 'password_reset_token'),
            'account_confirm_token' 	=>  Yii::t('common', 'account_confirm_token'),
            'created_at'       			=>  Yii::t('common', 'Created at'),
            'updated_at'       			=>  Yii::t('common', 'Updated at'),
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
     * @return AdminQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdminQuery(get_called_class());
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
     * Finds admin by username
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
 * This is the ActiveQuery class for [[Admin]].
 *
 * @see Admin
 */
class AdminQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return Admin[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
    
    /**
     * @inheritdoc
     * @return Admin|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}