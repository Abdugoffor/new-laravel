<?php
namespace App\Routes;

use App\Requests\Request;

class Route
{
    public static array $routes = [];

    public $url;
    public $method;

    public function __construct(Request $requset)
    {
        $this->url = $requset->url();
        $this->method = $requset->method();
    }
    public static function get(string $url, array $action)
    {
        if (!isset(self::$routes[$url])) {
            self::$routes['get'][$url] = $action;
        }
    }

    public static function post(string $url, array $action)
    {
        if (!isset(self::$routes[$url])) {
            self::$routes['post'][$url] = $action;
        }
    }
    public function action()
    {
        $path = $this->url;
        $method = $this->method;
        $action = self::$routes[$method][$path] ?? false;
        if (!$action) {
            echo "404 topilmadi";
        }
        
        if (is_array($action)) {
            call_user_func_array([new $action[0], $action[1]], []);
        }
    }
}
