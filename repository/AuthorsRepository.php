<?php

namespace app\repository;
use app\entity\Authors;
class AuthorsRepository
{

    public static function getAll()
    {
        return Authors::find()->all();
    }

    public static function getAuthorById($id){
        return Authors::findOne(['id' => $id]);
    }

}