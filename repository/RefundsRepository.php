<?php

namespace app\repository;
use app\entity\Refunds;
class RefundsRepository
{

    public static function getAll()
    {
        return Refunds::find()->all();
    }

}