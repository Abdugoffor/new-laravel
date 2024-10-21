<?php
namespace App\Controllers;

class PostController
{
    public function index()
    {
        return view('posts/index', 'Posts');
    }
}
