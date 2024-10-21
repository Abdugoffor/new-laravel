<?php
namespace App\Controllers;

use App\Models\User;
use App\Resources\UserResource;

class UserController
{
    public function index()
    {
        $models = UserResource::collection(User::all());
        dd($models);
        
    }
}
