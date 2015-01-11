<?php

namespace Marvel\Resources;

abstract class Base implements \Iterator
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

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->data[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function valid()
    {
        return isset($this->data[$this->position]);
    }
}