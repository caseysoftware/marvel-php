<?php

namespace Marvel;

class Comics extends \Marvel\Resources\Base
{
    protected $resource = 'comics';

    public function load($id)
    {
        $this->payload = $this->client->get($this->client->getUri() . $this->resource . '/' . $id);

        if (isset($this->payload['data'])) {
            $this->bind($this->payload['data']['results'][0]);
        }

        return $this;
    }

    public function characters()
    {
        $characters = new \Marvel\Characters($this->client);
        $characters->bind($this->characters);
        return $characters;
    }

    public function creators()
    {
        $creators = new \Marvel\Creators($this->client);
        $creators->bind($this->creators);
        return $creators;
    }

    public function events()
    {
        $events = new \Marvel\Events($this->client);
        $events->bind($this->events);
        return $events;
    }

    public function series()
    {
        $series = new \Marvel\Series($this->client);
        $series->bind($this->series);
        return $series;
    }
}