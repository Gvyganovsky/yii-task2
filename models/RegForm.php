<?php

namespace app\models;

use Yii;
use app\models\Users;

class RegForm extends Users
{
    public $passwordRepeat;

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
            'login' => 'Логин',
            'FIO' => 'ФИО',
            'phone' => 'Телефон',
            'email' => 'Почта',
            'password' => 'Пароль',
            'passwordRepeat' => 'Повтор пароля',
        ];
    }
}
