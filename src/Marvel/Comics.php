<?php

namespace Marvel;

class Comics implements \Iterator
{
    protected $client = null;
    protected $resource = 'comics';

    public $total = 0;
    public $count = 0;
    public $data  = '';

    public function __construct(\Marvel\Client $client)
    {
        $this->client = $client;
    }

    public function index($page = 1, $limit = 25, $params = array())
    {
        $page = max($page, 1);
        $limit = min($limit, 100);
        $offset = ($page - 1) * $limit;

        $params += array('offset' => $offset, 'limit' => $limit);

        $json = $this->client->get($this->client->getUri() . $this->resource, $params);
        $this->data = $json['data'];

        $this->total = $this->data['total'];
        $this->count = $this->data['count'];

        return $this;
    }

    public function rewind()
    {

    }

    public function current()
    {

    }

    public function key()
    {

    }

    public function next()
    {

    }

    public function valid()
    {

    }
}