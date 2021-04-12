<?php

namespace App\Http\Controllers;


use App\Repositories\User as UserRepository;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function list()
    {
        $users = $this->userRepo->getALlUser();

        return view('user.list', [
            'users' => $users
        ]);
    }
}
