<?php

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $password2;

    public static function tableName()
    {
        return '{{user}}';
    }
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'password2'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
            [['password'], 'required'],
            // rememberMe must be a boolean value
            ['password2', 'compare', 'compareAttribute' => 'password', 'message' => '{attribute} tidak cocok'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password2' => 'Ulangi password',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
}
