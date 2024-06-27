<?php

namespace app\repository;
use app\entity\Staff;
class StaffRepository
{

    public static function getAll()
    {
        return Staff::find()->all();
    }

    public static function getStaffById($id){
        return Staff::findOne(['id' => $id]);
    }

}