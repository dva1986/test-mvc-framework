<?php

namespace core;

/**
 * Class Config
 * @package core
 */
class Config
{
    /** @var mixed */
    private $config = [];

    /**
     * Config constructor.
     * @param $file
     * @throws \Exception
     */
    public function __construct($file)
    {
        if (!file_exists($file)) {
            throw new \Exception('Config file not found');
        }

        $this->config = require $file;
    }

    /**
     * @param $key
     * @return null
     */
    public function get($key)
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        return null;
    }

}