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

    /**
     * Initialize the routes file.
     */
    protected function initRoutes()
    {
        if (file_exists(ROOT . '/../config/routes.php')) {
            include(ROOT . '/../config/routes.php');
        } else {
            throw new \Exception('Routes files does not exists!');
        }
    }

    /**
     * Returns URI from URL string.
     */
    protected function getURI()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * Returns request method.
     */
    protected function getRequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
