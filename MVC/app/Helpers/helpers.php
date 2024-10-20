<?php

use App\Helpers\Auth;
use App\Helpers\Views;

if (!function_exists('dd')) {
    function dd(...$data)
    {
        echo "<body bgcolor='grey'>";
        echo "<pre style='background-color:black; color:#0dbb2a;'>";
        print_r($data);
        echo '</pre>';
        exit;
    }
}
if (!function_exists('view')) {
    function view($view, $title, $models = [])
    {
        Views::make($view, $title, $models);
    }
}

if (!function_exists('layout')) {
    function layout($main)
    {
        Views::$mian = $main;
    }
}
if (!function_exists('check')) {
    function check()
    {
        return Auth::check();
    }
}

if (!function_exists('auth')) {
    function auth()
    {
        return Auth::user();
    }
}
