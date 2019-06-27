<?php

require_once 'Models\Movie.php';
require_once 'Models\Actor.php';
require_once 'Models\Director.php';
require_once 'Models\Cast.php';
require_once 'connect.php';
require_once 'Managers\DirectorManager.php';


class ControllerDirector
{
    public function listDirector()
    {
        $dbd = daoconnect();
        $man = new DirectorManager($dbd);
        $list = $man->getList();
        require "Views\ListDirector.php";
    }

    public function viewFilmography($n)
    {
        $dbd = daoconnect();
        $man = new DirectorManager($dbd);
        $target = $man->get($n);
        $list = $man->getFilmo($n);
        require "Views\FilmoDirector.php";
    }

    public function createNewView()
    {
        require "Views\createNewDirector.php";
    }

    public function pushNew($tar)
    {
        $dbd = daoconnect();
        $man = new DirectorManager($dbd);
        $man->add($tar);
    }
}

?>