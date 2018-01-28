<?php

namespace core\Security;

/**
 * Class Security
 * @package core\Security
 */
class Security
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $password;

    /**
     * Security constructor.
     * @param string $name
     * @param string $password
     */
    public function __construct(string $name, string $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * @throws PermissionDeniedException
     */
    public function checkCredentials()
    {
        if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
            throw new PermissionDeniedException('PermissionDeniedException');
        }

        $authUser = $_SERVER['PHP_AUTH_USER'];
        $authPassword = $_SERVER['PHP_AUTH_PW'];

        if ($authUser !== $this->name || $this->password !== md5($authPassword)) {
            throw new PermissionDeniedException();
        }
    }

    public function denyAccess()
    {
        header('WWW-Authenticate: Basic realm="Secret page"');
        header('HTTP/1.0 401 Unauthorized');
        exit;
    }


}