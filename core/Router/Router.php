<?php

namespace core\Router;

/**
 * Class Router
 * @package core\Router
 */
class Router
{
    private $routes = [];

    /**
     * Router constructor.
     * @param $fileRouting
     */
    public function __construct($fileRouting)
    {
        $this->defineRoutes($fileRouting);
    }

    /**
     * @throws \Exception
     */
    private function defineRoutes($fileRouting)
    {
        if (!file_exists($fileRouting)) {
            throw new \Exception('Routing file not exists');
        }

        $this->routes = require ($fileRouting);
    }

    /**
     * @return mixed|null
     * @throws RouteNotFoundException
     */
    public function matchCurrentRequest()
    {
        $uri = $this->getURI();
        $uriArr = explode('/', $uri);

        $matchedRoute = null;
        foreach ($this->routes as $path => $route) {
            $pathArr = explode('/', trim($path, '/'));
            $matched = true;
            $params = [];

            if (count($pathArr) !== count($uriArr)) {
                continue;
            }

            foreach ($pathArr as $index => $filter) {
                if (!isset($uriArr[$index])) {
                    $matched = false;
                    continue;
                }

                $isParam = preg_match('/\:[0-9a-zA-Z]+/', $filter);
                if ($isParam) {
                    $params[str_replace(':', '', $filter)] = $uriArr[$index];
                } else if ($uriArr[$index] !== $filter) {
                    $matched = false;
                    continue;
                }
            }

           if ($matched === true) {
               $matchedRoute = $route;
               $matchedRoute['path'] = $path;
               $matchedRoute['params'] = $params;
           }
        }

        if (!$matchedRoute) {
            throw new RouteNotFoundException('Route not found');
        }

        return $matchedRoute;
    }

    /**
     * @return string
     */
    private function getURI()
    {
        $uri = '';
        if (!empty($_SERVER['PATH_INFO'])) {
            $uri = trim($_SERVER['PATH_INFO'], '/');
        }

        return $uri;
    }

}