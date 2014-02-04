<?php

abstract class Services_Marvel_Resources_Base
{
    public function bind($object)
    {
        foreach ($object as $property => $value) {
            $this->$property = $value;
        }

        return $this;
    }

    public function __call($name, $arguments)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
}
