<?php

namespace core\Collection;

use core\Model\Model;

class Collection
{
    private $models;

    /**
     * Collection constructor.
     */
    public function __construct()
    {
        $this->models = [];
    }

    /**
     * @param Model $entity
     * @return Collection
     */
    public function add(Model $entity)
    {
        $this->models[] = $entity;

        return $this;
    }

    /**
     * @return array
     */
    public function getModels()
    {
        return $this->models;
    }

}