<?php

require_once 'Entity.php';
require_once 'datehandling.php';

class InvalidDurationException extends Exception {};

class Movie extends Entity
{
    private $ID_FILM;
    private $ID_DIRECTOR;
    private $ID_GENRE;
    private $TITRE_FILM;
    private $DUREE_FILM;
    private $DATE_FILM;
    private $IMG_FILM;

    public function __construct($data)
    {
        parent::hydrate($data);
    }

    public function __toString()
    {
        return $this->TITRE_FILM . " " . dateFormatted($this->DATE_FILM) . " (" . dateYears($this->DATE_FILM) . ") <strong>Durée : " . $this->durationFormatted() . "</strong>";
    }

    public function durationFormatted()
    {
        $h = intdiv($this->DUREE_FILM, 60);
        $m = $this->DUREE_FILM % 60;
        if ($m < 10)
            return $h . ":0" . $m;
        else
            return $h . ":" . $m;
    }

    public function getID_F()
    {
        return $this->ID_FILM;
    }

    public function getID_D()
    {
        return $this->ID_DIRECTOR;
    }

    public function getID_G()
    {
        return $this->ID_GENRE;
    }

    public function getTitre()
    {
        return $this->TITRE_FILM;
    }

    public function getDuree()
    {
        return $this->DUREE_FILM;
    }

    public function getDate()
    {
        return $this->DATE_FILM;
    }

    public function getImg()
    {
        return $this->IMG_FILM;
    }

    public function setID_FILM($ID)
    {
        $this->ID_FILM = (int) $ID;
    }

    public function setID_DIRECTOR($ID)
    {
        $this->ID_DIRECTOR = (int) $ID;
    }

    public function setID_GENRE($ID)
    {
        $this->ID_GENRE = (int) $ID;
    }

    public function setTITRE_FILM($str)
    {
        $this->TITRE_FILM = $str;
    }

    public function setDUREE_FILM($nb)
    {
        $this->DUREE_FILM = (int) $nb;
    }

    public function setDATE_FILM($date)
    {
        $this->DATE_FILM = new DateTime($date);
    }

    public function setIMG_FILM($url)
    {
        $this->IMG_FILM = $url;
    }    
}

?>