<?php

namespace core\Controller;

use core\Config;

/**
 * Class Controller
 * @package core\Controller
 */
class Controller
{
    protected $container;

    /**
     * @var Config
     */
    private $config;

    /**
     * Controller constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

}