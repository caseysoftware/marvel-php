<?php

abstract class Services_Marvel_Resources_List
{
    protected $client = null;

    public $total = 0;
    public $count = 0;

    public function __construct(Services_Marvel $client)
    {
        $this->client = $client;
    }

    public function index($page = 1, $limit = 100)
    {
        $page = max($page, 1);
        $limit = min($limit, 100);
        $offset = ($page - 1) * $limit;

        $params = array('offset' => $offset, 'limit' => $limit);

        $this->client->get($this->client->getUri() . $this->resource, $params);

        $this->total = $this->client->response_obj->data->total;
        $this->count = $this->client->response_obj->data->count;

        return $this->client->response_obj->data->results;
    }

    public function get($id)
    {
        $this->client->get($this->client->getUri() . $this->resource . '/' . $id);

        if ($this->client->response_code != 200) {
            throw new Services_Marvel_Exceptions_NotFound("No $this->resource_name was found with id: $id", 404);
        }

        $object = new $this->resource_class();
        return $object->bind($this->client->response_obj->data->results[0]);
    }
}