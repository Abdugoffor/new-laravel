<?php
namespace App\Controllers;

use App\Helpers\Views;
use App\Models\User;
use App\Requests\UserStoreRequest;

class TestController
{
    public function index()
    {
        Views::make('index', 'Bosh saxifa');
    }
    public function test()
    {
        Views::make('test', 'Test saxifa');
    }
    public function about()
    {
        Views::make('about', 'About saxifa');
    }

    public function create()
    {
        $validate = new UserStoreRequest($_POST);
        if ($validate->validate()) {
            User::create($validate->getData());
            header('location: /');
            exit; 
        } else {
            
            Views::make('test', 'Test saxifa', [
                'errors' => $validate->errors(),
                'data' => $validate->getData(),
            ]);
        }
    }

}
