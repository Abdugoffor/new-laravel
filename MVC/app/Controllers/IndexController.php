<?php
namespace App\Controllers;

class IndexController
{
    public function index()
    {
        return view('index', 'Home');
    }

}
