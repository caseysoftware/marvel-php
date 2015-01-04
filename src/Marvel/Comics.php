<?php

namespace Marvel;

class Comics
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
        $data = $json['data'];

        $this->total = $data['total'];
        $this->count = $data['count'];
        $this->data = $data['results'];

        return $this;
    }
}