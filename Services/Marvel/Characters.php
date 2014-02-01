<?php

class Services_Marvel_Characters extends Services_Marvel_Resources_List
{
    protected $resource = 'characters';

    public function get($id)
    {
        $this->client->get($this->client->getUri() . $this->resource . '/' . $id);

        $character = new Services_Marvel_Character();

        if ($this->client->response_code != 200) {
            return $character;
        }

        return $character->bind($this->client->response_obj->data->results[0]);
    }
}