<?php

namespace core;

use core\Router\NotFoundHttpException;
use core\Router\Router;

/**
 * Class Application
 * @package core\Application
 */
class Application
{
    /** @var Router */
    private $router;

    /** @var Config */
    private $config;

    /**
     * Application constructor.
     * @param Config $config
     * @param Router $router
     */
    public function __construct(Config $config, Router $router)
    {
        $this->config = $config;
        $this->router = $router;
    }

    public function init()
    {
        $matchedRoute = $this->router->matchCurrentRequest();
        $this->involveAction($matchedRoute);
    }

    /**
     * @param $matchedRoute
     * @throws \Exception
     */
    private function involveAction($matchedRoute)
    {
        if (!class_exists($matchedRoute['controller'])) {
            throw new \Exception("Controller {$matchedRoute['controller']} not found");
        }

        $action = $matchedRoute['action'] . 'Action';
        $controller = new $matchedRoute['controller']($this->config);

        if (!method_exists($controller, $action)) {
            var_dump("Action {$action} for controller {$matchedRoute['controller']} not exists");
            throw new \Exception("Action {$action} for controller {$matchedRoute['controller']} not exists");
        }

        try {
            echo call_user_func_array([$controller, $action], $matchedRoute['params']);
        } catch (NotFoundHttpException $e) {
            header('HTTP/1.0 404 Not Found');
        }

    }


}