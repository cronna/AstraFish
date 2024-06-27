<?php

namespace app\repository;
use app\entity\Clients;
class ClientsRepository
{

    public static function getAll()
    {
        return Clients::find()->all();
    }

    public static function getClientById($id){
        return Clients::findOne(['id' => $id]);
    }

    public static function getClientByPassportNumber($passport_number){
        return Clients::findOne(['passport_number' => $passport_number]);
    }

    public static function editColumnBookToTrue($client_id)
    {
        $client = Clients::findOne(['id' => $client_id]);
        $client->book = true;
        $client->save(false);
    }



}