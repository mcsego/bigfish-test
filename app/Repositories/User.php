<?php


namespace App\Repositories;


use App\Models\User as UserModel;

class User
{
    public function getALlUser()
    {
        return UserModel::all();
    }
}
