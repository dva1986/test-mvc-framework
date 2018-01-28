<?php

return [
    '/' => [
        'controller' => 'src\\Controllers\\DefaultController',
        'action' => 'default'
    ],
    '/users' => [
        'controller' => 'src\\Controllers\\UserController',
        'action' => 'list'
    ],
    '/users/:id' => [
        'controller' => 'src\\Controllers\\UserController',
        'action' => 'get'
    ]
];