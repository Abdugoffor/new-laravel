<?php
namespace App\Helpers;

class Views
{
    public static $mian = 'layout/main';

    public static function make($view, $title, array $models = [])
    {
        extract($models);
        ob_start();
        include dirname(__DIR__) . '/views/' . $view . '.php';
        $content = ob_get_clean();
        include dirname(__DIR__) . '/views/' . self::$mian . '.php';
    }
}
