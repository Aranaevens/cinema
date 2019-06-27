<?php

require_once 'Models\Movie.php';
require_once 'Models\Actor.php';
require_once 'Models\Director.php';
require_once 'Models\Cast.php';
require_once 'connect.php';
require_once 'Managers\GenreManager.php';

class ControllerGenre
{
    private $init;

    public function __construct()
    {}

    public function listGenre()
    {
        $dbd = daoconnect();
        $man = new GenreManager($dbd);
        $list = $man->getList();
        require "Views\ListGenre.php";
    }

    public function viewFilmography($n)
    {
        $dbd = daoconnect();
        $man = new GenreManager($dbd);
        $target = $man->get($n);
        $list = $man->getFilmo($n);
        require "Views\FilmoGenre.php";
    }

    public function createNewView()
    {
        require "Views\createNewGenre.php";
    }

    public function pushNew($tar)
    {
        $dbd = daoconnect();
        $man = new GenreManager($dbd);
        $man->add($tar);
    }
}

