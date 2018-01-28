<?php

spl_autoload_register(function($class) {
    $filename = __DIR__ . '\\' . $class . '.php';
    $filename = str_replace('\\', '/', $filename);

    if (!file_exists($filename)) {
        throw new \Exception("File $filename not found");
    }

    include $filename;

    return true;
});
