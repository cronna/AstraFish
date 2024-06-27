<?php

namespace app\repository;
use app\entity\Distributions;
use app\entity\Conditions;
class DistRepository
{

    public static function getAll()
    {
        return Distributions::find()->all();
    }

    public static function getAllConditions()
    {
        return Conditions::find()->all();
    }

    public static function getDistById($id)
    {
        return Distributions::findOne(['id' => $id]);
    }

    public static function getDistsByClientId($client_id)
    {
        return Distributions::find()->where(['client_id' => $client_id])->all();
    }

    public static function deleteDistById($id)
    {
        $dist = Distributions::findOne(['id' => $id]);
        $dist->delete();
    }

}