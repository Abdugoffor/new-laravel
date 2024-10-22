<?php

namespace App\Helpers;

use App\Models\User;

class Auth
{
    public static function check()
    {
        if (isset($_SESSION['Auth']) && !empty($_SESSION['Auth'])) {
            return true;
        }
        return false;
    }

    public static function user()
    {
        if (self::check()) {
            return $_SESSION['Auth'];
        }
        return false;
    }

    public static function attach($data)
    {
        $user = User::attach($data);
        if ($user) {
            unset($data['password']);
            $_SESSION['Auth'] = $user;
            return true;
        } else {
            return false;
        }
    }
    public static function register(array $data)
    {
        $user = User::create($data);
        if ($user) {

            if (isset($data['name'])) {

                unset($data['name']);
            }

            if (isset($data['c_password'])) {

                unset($data['c_password']);
            }
            // dd($data);
            self::attach($data);
        } else {
            return false;
        }
    }

    public static function logout()
    {
        unset($_SESSION['Auth']);
    }
}
