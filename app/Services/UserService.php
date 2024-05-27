<?php

class UserService
{
    protected $user;

    public function __construct(UserRepository $userRepo)
    {
        $this->user = $userRepo;
    }

    public function index()
    {
        $allUsers = $this->user->find();
        $allUsers->with("posts")->withCount("likes")->get();
        return $allUsers;
    }

}


