<?php

namespace app\repository;
use app\entity\Books;
class BooksRepository
{

    public static function getAll()
    {
        return Books::find()->all();
    }

    public static function getBookById($id){
        return Books::findOne(['id' => $id]);
    }

    public static function getBookByArt($art){
        return Books::findOne(['art' => $art]);
    }

}