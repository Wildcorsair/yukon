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

    public static function post($route, $callback)
    {
        if ($route == '') {
            return false;
        }

        self::$routes[] = array('POST', $route, $callback);
    }

    public static function put($route, $callback)
    {
        if ($route == '') {
            return false;
        }

        self::$routes[] = array('PUT', $route, $callback);
    }

    public static function patch($route, $callback)
    {
        if ($route == '') {
            return false;
        }

        self::$routes[] = array('PATCH', $route, $callback);
    }

    public static function delete($route, $callback)
    {
        if ($route == '') {
            return false;
        }

        self::$routes[] = array('DELETE', $route, $callback);
    }

    protected function initRoutes()
    {
        include(ROOT . '/../config/routes.php');
    }

    protected function getURI()
    {
        return $_SERVER['REQUEST_URI'];
    }

    protected function getRequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
