<?php

class Services_Marvel_Comic
{
    public $id = '';
    public $digitalId = '';
    public $title = '';
    public $issueNumber = '';
    public $variantDescription = '';
    public $description = '';
    public $modified = '';
    public $isbn = '';
    public $upc = '';
    public $diamondCode = '';
    public $ean = '';
    public $issn = '';
    public $format = '';
    public $pageCount = '';
    public $textObjects = '';
    public $resourceURI = '';
    public $urls = '';
    public $series = '';
    public $variants = '';
    public $collections = '';
    public $collectedIssues = '';
    public $dates = '';
    public $prices = '';
    public $thumbnail = '';
    public $images = '';
    public $creators = '';
    public $characters = '';
    public $stories = '';
    public $events = '';

    public function bind($object)
    {
        foreach($object as $property => $value)
        {
            $this->$property = $value;
        }

        return $this;
    }
}