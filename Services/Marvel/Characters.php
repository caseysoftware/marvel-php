<?php

class Services_Marvel_Characters extends Services_Marvel_Resources_List
{
    protected $resource = 'characters';

    public function get($id)
    {
        $this->client->get($this->client->getUri() . $this->resource . '/' . $id);

        if ($this->client->response_code != 200) {
            throw new Services_Marvel_Exceptions_NotFound("No character was found with id: $id", 404);
        }

        $character = new Services_Marvel_Character();
        return $character->bind($this->client->response_obj->data->results[0]);
    }
}