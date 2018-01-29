<?php

require_once __DIR__ . '/../autoload.php';

$configFile = __DIR__ . '/../app/config.php';
$routingFile = __DIR__ . '/../app/routing.php';

$config = new \core\Config($configFile);
$router = new \core\Router\Router($routingFile);

$app = new core\Application($config, $router);
$app->init();
