<?php

require_once 'Entity.php';


class Actor extends Entity
{
    private $ID_ACTOR;
    private $PRENOM_ACTOR;
    private $NOM_ACTOR;
    private $BIRTH_ACTOR;
    private $GENDER_ACTOR;

    public function __construct($data)
    {
        parent::hydrate($data);
    }

    public function __toString()
    {
        return $this->PRENOM_ACTOR . ' ' . $this->NOM_ACTOR;
    }

    public function getID()
    {
        return $this->ID_ACTOR;
    }

    public function getPrenom()
    {
        return $this->PRENOM_ACTOR;
    }

    public function getNom()
    {
        return $this->NOM_ACTOR;
    }

    public function getBirth()
    {
        return $this->BIRTH_ACTOR;
    }

    public function getGender()
    {
        return $this->GENDER_ACTOR;
    }

    public function setID_ACTOR($ID)
    {
        $this->ID_ACTOR = $ID;
    }

    public function setPRENOM_ACTOR($Pre)
    {
        $this->PRENOM_ACTOR = $Pre;
    }

    public function setNOM_ACTOR($Nom)
    {
        $this->NOM_ACTOR = $Nom;
    }

    public function setBIRTH_ACTOR($date)
    {
        $this->BIRTH_ACTOR = new DateTime($date);
    }

    public function setGENDER_ACTOR($gen)
    {
        $this->GENDER_ACTOR = $gen;
    }
}

?>