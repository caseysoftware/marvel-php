<?php

class Services_Marvel_Character
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

    public function bind($object)
    {
        foreach($object as $property => $value)
        {
            $this->$property = $value;
        }

        return $this;
    }
}