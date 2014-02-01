<?php

class Services_Marvel_Comics extends Services_Marvel_Resources_List
{
    public function index($page = 1, $limit = 100)
    {
        $page = max($page, 1);
        $limit = min($limit, 100);
        $offset = ($page - 1) * $limit;

        $params = array('offset' => $offset, 'limit' => $limit);

        $this->client->get($this->client->getUri() . 'comics', $params);

        $this->total = $this->client->response_obj->data->total;
        $this->count = $this->client->response_obj->data->count;

        return $this->client->response_obj->data->results;
    }
}