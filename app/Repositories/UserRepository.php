<?php
namespace App\Repositories; 

use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface{
    public function getItem($id){
        echo __METHOD__;
    }
}