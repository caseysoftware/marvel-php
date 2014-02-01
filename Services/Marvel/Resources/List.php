<?php

class Services_Marvel_Resources_List
{
    protected $client = null;

    public $total = 0;
    public $count = 0;

    public function __construct(Services_Marvel $client)
    {
        $this->client = $client;
    }
}