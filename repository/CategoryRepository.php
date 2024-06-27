<?php

namespace app\repository;
use app\entity\Categories;
class CategoryRepository
{

    public static function getAll()
    {
        return CAtegories::find()->all();
    }

    public static function getCategoryById($id)
    {
        return Categories::findOne(['id' => $id]);
    }

}