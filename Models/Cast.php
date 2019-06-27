<?php

require_once 'Entity.php';

class Cast extends Entity
{
    private $ID_ACTOR;
    private $ID_ROLE;
    private $ID_FILM;

    public function __construct($data)
    {
        parent::hydrate($data);
    }

    public function getActor()
    {
        return $this->ID_ACTOR;
    }

    public function getFilm()
    {
        return $this->ID_FILM;
    }

    public function getRole()
    {
        return $this->ID_ROLE;
    }

    public function setID_ACTOR($ID)
    {
        $this->ID_ACTOR = $ID;
    }

    public function setID_FILM($ID)
    {
        $this->ID_FILM = $ID;
    }

    public function setID_ROLE($ID)
    {
        $this->ID_ROLE = $ID;
    }
}

?>