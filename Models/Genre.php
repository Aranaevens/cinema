<?php

require_once 'Entity.php';

class Genre extends Entity
{
    private $ID_GENRE;
    private $NOM_GENRE;

    public function __construct($data)
    {
        parent::hydrate($data);
    }

    public function __toString()
    {
        return $this->NOM_GENRE;
    }

    public function getID()
    {
        return $this->ID_GENRE;
    }

    public function getNom()
    {
        return $this->NOM_GENRE;
    }

    public function setID_GENRE($ID)
    {
        $this->ID_GENRE = $ID;
    }

    public function setNOM_GENRE($Name)
    {
        $this->NOM_GENRE = $Name;
    }
}

?>