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

    public function __get($name)
    {
        return '';
    }

    public function __call($name, $params)
    {
        if (isset($this->$name)) {
            $class = '\Marvel\\' . ucwords($name);

            $object = new $class($this->client);
            $object->bind($this->$name);
            return $object;
        }
    }

    public function index($page = 1, $limit = 25, $params = array())
    {
        $page = max($page, 1);
        $limit = min($limit, 100);
        $offset = ($page - 1) * $limit;

        $params += array('offset' => $offset, 'limit' => $limit);

        $json = $this->client->get($this->client->getUri() . $this->resource, $params);
        $data = $json['data'];

        $this->total = $data['total'];
        $this->count = $data['count'];
        $this->data = $data['results'];

        return $this;
    }

    public function load($id)
    {
        $this->payload = $this->client->get($this->client->getUri() . $this->resource . '/' . $id);

        if (isset($this->payload['data'])) {
            $this->bind($this->payload['data']['results'][0]);
        }

        return $this;
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