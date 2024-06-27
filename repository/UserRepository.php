<?php

namespace app\repository;
use app\entity\Users;

class UserRepository
{
    public static function getUserById($id){
        return Users::findOne(['id' => $id]);
    }

    public static function getUserByLogin($login){
        return Users::findOne(['login' => $login]);
    }

    public static function createUser($login, $password){
        $user = new Users();
        $user->login = $login;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->save();
        return $user->id;
    }

}