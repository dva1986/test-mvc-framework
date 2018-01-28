<?php

namespace src\Controllers;

use core\Controller\Controller;
use src\Services\Security;

/**
 * Class DefaultController
 * @package src\Controllers
 */
class DefaultController extends Controller
{
    /**
     *
     */
    public function defaultAction()
    {
        $security = new Security($this->getConfig());
        $security->checkCredentials();
    }
}