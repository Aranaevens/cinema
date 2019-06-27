<?php

require_once 'Models\Movie.php';
require_once 'Models\Actor.php';
require_once 'Models\Director.php';
require_once 'Models\Cast.php';
require_once 'connect.php';
require_once 'Managers\ActorManager.php';


class ControllerActor
{
    private $init;

    public function __construct()
    {
        $this->init = false;
    }

    public function listActor()
    {
        $dbd = daoconnect();
        $man = new ActorManager($dbd);
        $list = $man->getList();
        require "Views\ListActor.php";
    }

    public function viewFilmography($n)
    {
        $dbd = daoconnect();
        $man = new ActorManager($dbd);
        $target = $man->get($n);
        $list = $man->getFilmo($n);
        require "Views\FilmoActor.php";
    }

    public function createNewView()
    {
        require "Views\createNewActor.php";
    }

    public function pushNew($tar)
    {
        $dbd = daoconnect();
        $man = new ActorManager($dbd);
        $man->add($tar);
    }

    
}

?>