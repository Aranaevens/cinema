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

    public function deleteView()
    {
        $dbd = daoconnect();
        $man = new DirectorManager($dbd);
        $list = $man->getList();
        require "Views\deleteDirectorView.php";
    }

    public function deleteOne($id)
    {
        $dbd = daoconnect();
        $man = new DirectorManager($dbd);
        $man->delete($id);
    }

    public function editView()
    {
        $dbd = daoconnect();
        $man = new DirectorManager($dbd);
        $list = $man->getList();
        require "Views\\editDirectorView.php";
    }

    public function editPlacehold($i)
    {
        $dbd = daoconnect();
        $man = new DirectorManager($dbd);
        $target = $man->get($i);
        return array(
            "target" => $target,
        );
    }
    
    public function editOne($o)
    {
        $dbd = daoconnect();
        $man = new DirectorManager($dbd);
        $man->delete($o);
    }
}

?>