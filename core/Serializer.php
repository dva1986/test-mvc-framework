<?php

namespace core;

/**
 * Class Serializer
 * @package core
 */
class Serializer
{
    /**
     * @param $data
     * @return string
     */
    public function serialize($data)
    {
        if (is_object($data)) {
            return json_encode($this->getProperties($data));
        }

        $models = [];
        foreach($data as $model) {
            $models[] = $this->getProperties($model);
        }

        return json_encode($models);
    }

    /**
     * @param $model
     * @return array
     */
    private function getProperties($model)
    {
        $currentData = [];
        $reflection = new \ReflectionClass($model);
        $props = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);
        foreach($props as $prop) {
            $prop->setAccessible(true);
            $currentData[$prop->getName()] = $prop->getValue($model);
        }

        return $currentData;
    }
}