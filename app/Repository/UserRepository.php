<?php

use App\Models\User;
class UserRepository extends GenericRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}