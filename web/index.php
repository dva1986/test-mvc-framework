<?php

require_once __DIR__ . '/../autoload.php';

$configFile = __DIR__ . '/../app/config.php';
$routingFile = __DIR__ . '/../app/routing.php';

$app = new core\Application($configFile, $routingFile);
$app->init();
