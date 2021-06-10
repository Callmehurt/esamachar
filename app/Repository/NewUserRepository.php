<?php

namespace App\Repository;

use App\User;
use Illuminate\Support\Facades\DB;

class NewUserRepository{

    private $user;

    public function __construct( User $user)
    {
        $this->user = $user;
    }

    public function all(){
        $users = $this->user->orderBy('created_at', 'DESC')->get();
        return $users;
    }


}