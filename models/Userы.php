<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Users".
 *
 * @property int $id_user
 * @property string $login
 * @property string $password
 * @property string $FIO
 * @property string $phone
 * @property string $email
 * @property int $admin
 *
 * @property Applications[] $applications
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'FIO', 'phone', 'email'], 'required'],
            [['admin'], 'integer'],
            [['login', 'password', 'FIO', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'login' => 'Login',
            'password' => 'Password',
            'FIO' => 'Fio',
            'phone' => 'Phone',
            'email' => 'Email',
            'admin' => 'Admin',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Applications::class, ['user_id' => 'id_user']);
    }

     ####################################
    # Реализация интерфейса
    ####################################

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find() -> where(['login' => $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {

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
}
