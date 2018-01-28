<?php

namespace src\Services;

use core\Config;
use core\Security\PermissionDeniedException;
use core\Security\Security as BaseSecurity;

class Security
{
    /** @var Config */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function checkCredentials()
    {
        $user = $this->config->get('user');
        $security = new BaseSecurity($user['name'], $user['password']);

        try {
            $security->checkCredentials();
        } catch (PermissionDeniedException $e) {
            $security->denyAccess();
        }
    }


}