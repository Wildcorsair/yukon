<?php

namespace Yukon\Core\App;

class RouterController
{
    public static $routes = [];
    public static $prefix;
    protected $_prefix = '';

    public static function get($route, $callback)
    {
        if ($route == '') {
            return false;
        }

        if (!empty(self::$prefix)) {
          $route = self::$prefix . $route;
        }

        self::$routes[] = array('GET', $route, $callback);
    }

    public static function post($route, $callback)
    {
        if ($route == '') {
            return false;
        }

        if (!empty(self::$prefix)) {
          $route = self::$prefix . $route;
        }

        self::$routes[] = array('POST', $route, $callback);
    }

    public static function put($route, $callback)
    {
        if ($route == '') {
            return false;
        }

        if (!empty(self::$prefix)) {
          $route = self::$prefix . $route;
        }

        self::$routes[] = array('PUT', $route, $callback);
    }

    public static function patch($route, $callback)
    {
        if ($route == '') {
            return false;
        }

        if (!empty(self::$prefix)) {
          $route = self::$prefix . $route;
        }

        self::$routes[] = array('PATCH', $route, $callback);
    }

    public static function delete($route, $callback)
    {
        if ($route == '') {
            return false;
        }

        if (!empty(self::$prefix)) {
          $route = self::$prefix . $route;
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
            echo '<pre>';
            var_dump(self::$routes);
            echo '</pre>';
        } else {
            throw new \Exception('Routes file does not exists!');
        }
    }

    public static function prefix($prefix)
    {
      $self = __CLASS__;
      $self = new $self();
      if (isset($prefix) && !empty($prefix)) {
        $self->_prefix = $prefix;
      }

      return $self;
    }

    public function group($callback)
    {
      self::$prefix = $this->_prefix;
      $callback();
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
