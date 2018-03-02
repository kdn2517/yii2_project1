<?php

namespace app\models;
use yii\base\Model;
use app\models\User;

class SignupForm extends Model
{
 
    public $username;
    public $password;
    public $email;
 
    public function rules() 
    {
        return [
            [['username', 'password', 'email'], 'required', 
                                                 'message' => 'Заполните поле'],
            ['username', 'unique', 'targetClass' => User::className(), 
                                           'message' => 'Этот логин уже занят'],
            ['email', 'unique', 'targetClass' => User::className(), 
                                           'message' => 'Этот email уже занят'],
            ['email', 'email', 'message' => 'Введите корректный email'],
        ];
    }
 
    public function attributeLabels() 
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'email' => 'email',
        ];
    }

}

