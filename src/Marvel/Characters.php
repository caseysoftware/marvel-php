<?php

namespace Marvel;

class Characters extends \Marvel\Resources\Base
{
    protected $resource = 'characters';

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