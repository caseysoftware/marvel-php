<?php

abstract class Services_Marvel_Resources_Base
{
    public function bind($object)
    {
        foreach($object as $property => $value)
        {
            $this->$property = $value;
        }

        return $this;
    }
}