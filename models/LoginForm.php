<?php

namespace app\models;

use Yii;
use app\repository\UserRepository;
use app\entity\Users;

class LoginForm extends \yii\db\ActiveRecord
{
    public $login;
    public $password;
    public $_user = false;


    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            ['password', 'validatePassword']
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль'
        ];
    }

    

    public function getUser()
    {
        
        if($this->_user === false){
            $this->_user = UserRepository::getUserByLogin($this->login);
        }
    
        return $this->_user;
    }

    public function validatePassword($attribute, $params)
    {
        if(!$this->hasErrors()){
            $user = $this->getUser();
            if(!$user || !$user->validatePassword($this->password)){
                $this->addError($attribute, 'неверный логин или пароль');
            }
        }
    }

    public function login()
    {
        if($this->validate()){
            return Yii::$app->user->login($this->getUser());
        }

        return false;
    }


}