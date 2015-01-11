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

    public function comics()
    {
        $comics = new \Marvel\Comics($this->client);
        $comics->bind($this->comics);
        return $comics;
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