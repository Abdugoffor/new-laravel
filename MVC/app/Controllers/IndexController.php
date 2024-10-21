<?php
namespace App\Controllers;

use App\Helpers\Views;
use App\Requests\UserStoreRequest;

class IndexController
{
    public function index()
    {
        return view('index', 'Home');
    }

    public function create()
    {
        $validate = new UserStoreRequest($_POST);
        // dd($validate);
        if ($validate->validate()) {
            // User::create($validate->getData());
            return redirect('/test');
        } else {

            Views::make('test', 'Test saxifa', [
                'errors' => $validate->errors(),
                'data' => $validate->getData(),
            ]);
        }
    }

}
