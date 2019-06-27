<?php

require_once 'Entity.php';

class Role extends Entity
{
    private $ID_ROLE;
    private $NOM_ROLE;

    public function __construct($data)
    {
        parent::hydrate($data);
    }

    public function __toString()
    {
        return $this->NOM_ROLE;
    }

    public function getID()
    {
        return $this->ID_ROLE;
    }

    public function getNom()
    {
        return $this->NOM_ROLE;
    }

    public function setID_ROLE($ID)
    {
        $this->ID_ROLE = (int) $ID;
    }

    public function setNOM_ROLE($Name)
    {
        $this->NOM_ROLE = $Name;
    }
}