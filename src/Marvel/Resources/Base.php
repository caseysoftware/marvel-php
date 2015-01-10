<?php

namespace Marvel\Resources;

abstract class Base
{
    protected $client = null;
    protected $position = 0;
    protected $payload = '';

    public $total = 0;
    public $count = 0;
    public $data  = '';

    public function __construct(\Marvel\Client $client)
    {
        $this->client = $client;
    }

    public function bind($hash)
    {
        foreach ($hash as $key => $value) {
            $this->$key = $value;
        }
    }
}