<?php

namespace Yukon\Core\App;

class Router extends RouterController
{

    /**
     * @var string
     */
    public $controller;

    /**
     * @var string
     */
    public $method;

    /**
     * @var boolean
     */
    private $isRouteMatch = false;

    public function __construct()
    {
        try {
            $this->initRoutes();

            $uri = $this->getURI();
            $requestMethod = $this->getRequestMethod();

            foreach (self::$routes as $params) {
                list($method, $route, $callback) = $params;

                $route = (strlen($route) > 1) ? rtrim($route, '/') : $route;
                $transformedRoute = preg_replace('/{[\w]+}/', '[\w]+', $route);

                if (preg_match('~^' . $transformedRoute . '$~i', $uri) ) {
                    if ($requestMethod == $method) {

                        if (gettype($callback) == 'object') {
                            $callback();
                        } else {
                            $attribute = $this->getAttributeParts($callback);
                            list($controller, $method) = $attribute;

                            $this->controller = $controller;
                            $this->method = $method;
                        }
                        $this->isRouteMatch = true;
                        break;
                    }
                }
            }

            if (!$this->isRouteMatch) {
                throw new \Exception('404 - Page not found.');
            } else if ($this->isRouteMatch && !empty($this->controller)) {
                $params = $this->matchParams($uri, $route);
                $this->run($params);
            }

        } catch(\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    /**
     * Compares URI string with template string from the route and builds array
     * with matched parameters.
     *
     * @param string $uri URI string
     * @param string $route Template string from the route
     * @return array
     */
    private function matchParams($uri, $route)
    {
        $params = array();
        $uriParts = explode('/', $uri);
        $routeParts = explode('/', $route);

        for ($i = 0; $i < count($routeParts); $i++) {
            if (isset($routeParts[$i]) && isset($uriParts[$i]) && $routeParts[$i] != $uriParts[$i]) {
                $paramName = preg_replace('/[{|}]/', '', $routeParts[$i]);
                $params[] = $uriParts[$i];
            }
        }

        return $params;
    }

    private function getMethodParamsCount($object, $method)
    {
        $classMethod = new \ReflectionMethod(get_class($object), $method);
        return count($classMethod->getParameters());
    }

    private function getAttributeParts($actionParams)
    {
        if ($actionParams == '') {
            throw new \Exception('Controller or action isn\'t defined for the route.');
        }

        if (stripos($actionParams, '@') == 0) {
            throw new \Exception('Action isn\'t defined for the route.');
        }

        return explode('@', $actionParams);
    }

    private function run(array $params)
    {
        try {
            if (is_null($this->controller) || $this->controller == '') {
                throw new \Exception('Controller not found.');

            }

            if (is_null($this->method) || $this->method == '') {
                throw new \Exception('Method not found.');
            }

            $controllerFullName = '\Yukon\Controller\\' . $this->controller;
            $methodName = $this->method;

            $app = new $controllerFullName();
            if (method_exists($app, $methodName)) {
                $argumentCount = $this->getMethodParamsCount($app, $methodName);
                if ($argumentCount > count($params)) {
                    throw new \Exception("Parameter was defined in the controller method, but doesn't use in the route.");
                }
                $app->$methodName(...$params);
            } else {
                throw new \Exception('Method: ' . $methodName . ' is not found in the class: ' . $controllerFullName);
            }
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
