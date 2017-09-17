<?php

namespace Yukon\Core\App;

class Router
{

    /**
     * @var string
     */
    public $controller;
    
    /**
     * @var string
     */
    public $method;

    public function __construct()
    {
        $routes = include(ROOT . '/../config/routes.cfg.php');

        $uri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($routes as $route => $params) {
            $route = (strlen($route) > 1) ? rtrim($route, '/') : $route;
            $transformedRoute = preg_replace('/{[\w]+}/', '[\w]+', $route);

            if (preg_match('~^' . $transformedRoute . '$~i', $uri) ) {
                // params[0] - request method (GET/POST/PUT)
                if ($requestMethod == $params[0]) {
                    
                    // params[1] - controller name
                    $this->controller = $params[1];
                    
                    // params[2] - method name
                    $this->method = $params[2];
                    break;
                }
            }
        }
        $params = $this->matchParams($uri, $route);
        $this->run($params);
    }

    private function matchParams($uri, $route)
    {
        $params = array();
        $uriParts = explode('/', $uri);
        $routeParts = explode('/', $route);

        for ($i = 0; $i < count($routeParts); $i++) {
            if ($routeParts[$i] != $uriParts[$i]) {
                $paramName = preg_replace('/[{|}]/', '', $routeParts[$i]);
                // $params[$paramName] = $uriParts[$i];
                $params[] = $uriParts[$i];
            }
        }

        return $params;
    }

    private function run(array $params)
    {
        if (is_null($this->controller) || $this->controller == '') {
            return false;
        }

        if (is_null($this->method) || $this->method == '') {
            return false;
        }

        $controllerFullName = '\Yukon\Controller\\' . $this->controller;
        $methodName = $this->method;
        
        try {
            $app = new $controllerFullName();
            if (method_exists($app, $methodName)) {
                $app->$methodName(...$params);
            } else {
                throw new \Exception('Method: ' . $methodName . ' not found in the class: ' . $controllerFullName);
            }
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
