<?php

namespace Marvel;

class Characters extends \Marvel\Resources\Base
{
    protected $resource = 'characters';

    /**
     * This is a helper function in case we need Earth's mightiest heroes, The Avengers.
     *
     * @return array
     */
    public function assemble()
    {
        $team = array();

        $characters = $this->index(1, 25, array('name' => 'Captain America'));
        $team[] = $characters->data[0];

        $characters = $this->index(1, 25, array('name' => 'Iron Man'));
        $team[] = $characters->data[0];

        $characters = $this->index(1, 25, array('name' => 'Thor'));
        $team[] = $characters->data[0];

        $characters = $this->index(1, 25, array('name' => 'Hulk'));
        $team[] = $characters->data[0];

        $characters = $this->index(1, 25, array('name' => 'Wasp'));
        $team[] = $characters->data[0];

        $characters = $this->index(1, 25, array('name' => 'Hank Pym'));
        $team[] = $characters->data[0];

        $characters = $this->index(1, 25, array('name' => 'Black Widow'));
        $team[] = $characters->data[0];

        return $team;
    }
}