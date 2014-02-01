<?php

class Services_Marvel_Comics extends Services_Marvel_Resources_List
{
    protected $resource = 'comics';

    public function get($id)
    {
        $this->client->get($this->client->getUri() . $this->resource . '/' . $id);

        if ($this->client->response_code != 200) {
            throw new Services_Marvel_Exceptions_NotFound("No comic was found with id: $id", 404);
        }

        $comic = new Services_Marvel_Comic();
        return $comic->bind($this->client->response_obj->data->results[0]);
    }
}