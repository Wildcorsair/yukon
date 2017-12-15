<?php

namespace Yukon\Core\App;

class RouterController
{
    public static $routes = [];

    public static function get($route, $callback)
    {
        if ($route == '') {
            return false;
        }

        self::$routes[] = array('GET', $route, $callback);
    }

    public static function post()
    {
        if ($route == '') {
            return false;
        }

        self::$routes[] = array('POST', $route, $callback);
    }

    public static function put() {

    }

    public static function delete() {

    }
}
