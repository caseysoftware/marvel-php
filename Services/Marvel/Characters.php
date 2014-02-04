<?php

class Services_Marvel_Characters extends Services_Marvel_Resources_Loader
{
    protected $resource = 'characters';
    protected $resource_name = 'Character';
    protected $resource_class = 'Services_Marvel_Character';

    /**
     * This is a helper function in case we need Earth's mightiest heroes, The Avengers.
     *
     * @return array
     */
    public function assemble()
    {
        $team = array();

        $characters = $this->index(1, 25, array('name' => 'Iron Man'));
        $team[] = $characters[0];

        $characters = $this->index(1, 25, array('name' => 'Thor'));
        $team[] = $characters[0];

        $characters = $this->index(1, 25, array('name' => 'Hulk'));
        $team[] = $characters[0];

        $characters = $this->index(1, 25, array('name' => 'Wasp'));
        $team[] = $characters[0];

        $characters = $this->index(1, 25, array('name' => 'Hank Pym'));
        $team[] = $characters[0];

        return $team;
    }
}
