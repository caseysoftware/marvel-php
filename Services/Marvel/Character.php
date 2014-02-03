<?php

class Services_Marvel_Character extends Services_Marvel_Resources_Base
{
    public $id = '';
    public $name = '';
    public $description = '';
    public $modified = '';
    public $thumbnail = '';
    public $resourceURI = '';
    public $comics = '';
    public $series = '';
    public $stories = '';
    public $events = '';
    public $urls = '';

    public function __call($name, $arguments)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
}