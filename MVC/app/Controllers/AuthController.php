<?php
namespace App\Controllers;

use App\Helpers\Auth;
use App\Requests\Auth\LoginRequest;
use App\Requests\Auth\RegisterRequest;

class AuthController
{
    public function loginPage()
    {
        return view('auth/login', 'Login');
    }
    public function login()
    {
        $validate = new LoginRequest($_POST);

        if ($validate->validate()) {
            Auth::attach($validate->getData());

            return redirect('/');
        } else {
            return view('auth/login', 'Login', [
                'errors' => $validate->errors(),
                'data' => $validate->getData(),
            ]);
        }
    }
    public function registerPage()
    {
        return view('auth/register', 'Register');
    }
    public function register()
    {
        $validate = new RegisterRequest($_POST);

        if ($validate->validate()) {
            Auth::register($validate->getData());

            return redirect('/');
        } else {

            return view('auth/register', 'Register', [
                'errors' => $validate->errors(),
                'data' => $validate->getData(),
            ]);
        }
    }
    public function logaut()
    {
        Auth::logout();

        return redirect('/login');
    }
}
