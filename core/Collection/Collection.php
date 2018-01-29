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


    /**
     * @param int $id
     * @return mixed|null
     */
    public function findById(int $id)
    {
        $collection = array_filter($this->models, function(Model $model) use ($id) {
            return $model->getId() === $id;
        });

        return count($collection) ? array_pop($collection) : null;
    }

}