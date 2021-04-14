<?php


namespace App\Repositories;


use App\Models\User as UserModel;

class User
{
    public function getAllUser()
    {
        return UserModel::all();
    }
}
