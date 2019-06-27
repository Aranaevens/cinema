<?php

require_once 'Entity.php';


class Director extends Entity
{
    private $ID_DIRECTOR;
    private $PRENOM_DIRECTOR;
    private $NOM_DIRECTOR;
    private $BIRTH_DIRECTOR; 

    public function __construct($data)
    {
        parent::hydrate($data);
    }

    public function __toString()
    {
        return $this->PRENOM_DIRECTOR . ' ' . $this->NOM_DIRECTOR;
    }

    public function getID()
    {
        return $this->ID_DIRECTOR;
    }

    public function getPrenom()
    {
        return $this->PRENOM_DIRECTOR;
    }

    public function getNom()
    {
        return $this->NOM_DIRECTOR;
    }

    public function getBirth()
    {
        return $this->BIRTH_DIRECTOR;
    }

    public function setID_DIRECTOR($ID)
    {
        $this->ID_DIRECTOR = $ID;
    }

    public function setPRENOM_DIRECTOR($Pre)
    {
        $this->PRENOM_DIRECTOR = $Pre;
    }

    public function setNOM_DIRECTOR($Nom)
    {
        $this->NOM_DIRECTOR = $Nom;
    }

    public function setBIRTH_DIRECTOR($date)
    {
        $this->BIRTH_DIRECTOR = new DateTime($date);
    }
}

?>