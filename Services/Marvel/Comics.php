<?php

class Services_Marvel_Comics
{
    protected $client = null;

    public function __construct(Services_Marvel $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $this->client->get($this->client->getUri() . 'comics');

        return $this->client->response_obj;
    }
}