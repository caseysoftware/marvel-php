<?php

namespace Marvel;

class Comics
{
    protected $client = null;
    protected $resource = 'comics';

    public $total = 0;
    public $count = 0;

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

        $this->client->get($this->client->getUri() . $this->resource, $params);

        $this->total = $this->client->response->data->total;
        $this->count = $this->client->response->data->count;

        return $this->client->response_obj->data->results;
    }
}