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
            [['login', 'password', 'FIO', 'email'], 'string', 'max' => 255],
            [['login', 'password', 'FIO', 'phone', 'email'], 'required', 'message' => 'Обязательное поле'],
            [
                ['login'],
                'unique',
            ],
            [
                ['password'],
                'match',
                'pattern' => '/^.{6,}$/',
                'message' => 'Минимальная длина пароля - 6 символов'
            ],     
            [
                ['FIO'],
                'match',
                'pattern' => '/^[А-Яа-яЁё\s]+$/u',
                'message' => 'Допустимы только кириллические символы и пробелы.'
            ],           
            [
                ['phone'],
                'match',
                'pattern' => '/^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$/',
                'message' => 'Пожалуйста, введите номер в формате +7(XXX)-XXX-XX-XX'
            ],            
            [
                ['passwordRepeat'],
                'compare',
                'compareAttribute' => 'password',
                'message' => 'Пароли не совпадают'
            ],
            [['email'], 'email'],
            [['phone'], 'string', 'max' => 17],
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
