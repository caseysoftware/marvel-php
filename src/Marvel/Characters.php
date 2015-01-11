<?php

namespace Marvel;

class Characters extends \Marvel\Resources\Base
{
    protected $resource = 'characters';

    public function load($id)
    {
        $this->payload = $this->client->get($this->client->getUri() . $this->resource . '/' . $id);

        if (isset($this->payload['data'])) {
            $this->bind($this->payload['data']['results'][0]);
        }

        return $this;
    }
}