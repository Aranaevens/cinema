<?php

require_once 'Models\Movie.php';
require_once 'Models\Actor.php';
require_once 'Models\Director.php';
require_once 'Models\Cast.php';
require_once 'connect.php';
require_once 'Managers\MovieManager.php';
require_once 'Managers\DirectorManager.php';
require_once 'Managers\GenreManager.php';
require_once 'Managers\ActorManager.php';
require_once 'Managers\RoleManager.php';
require_once 'Managers\CastManager.php';


class ControllerMovie
{
    private $init;

    public function __construct()
    {
    }

    public function listMovie()
    {
        $dbd = daoconnect();
        $man = new MovieManager($dbd);
        $list = $man->getDList();
        require "Views\ListMovie.php";
    }

    public function viewActors($n)
    {
        $dbd = daoconnect();
        $man = new MovieManager($dbd);
        $target = $man->get($n);
        $list = $man->getCasting($n);
        require "Views\CastingMovie.php";
    }

    public function viewDetails($n)
    {
        $dbd = daoconnect();
        $man = new MovieManager($dbd);
        $target = $man->get($n);
        $dir = $man->getDir($n);
        $act = $man->getAct($n);
        $gen = $man->getGen($n);
        require "Views\DetailMovie.php";
    }

    public function createNewView()
    {
        $dbd = daoconnect();
        $man_d = new DirectorManager($dbd);
        $man_g = new GenreManager($dbd);
        $l_d = $man_d->getList();
        $l_g = $man_g->getList();
        require "Views\createNewMovie.php";
    }

    public function createIn(Movie $m)
    {
        $dbd = daoconnect();
        $man = new MovieManager($dbd);
        $man->add($m);
    }

    public function createNewCasting()
    {
        $dbd = daoconnect();
        $man_a = new ActorManager($dbd);
        $man_r = new RoleManager($dbd);
        $man_m = new MovieManager($dbd);
        $l_a = $man_a->getList();
        $l_r = $man_r->getList();
        $l_m = $man_m->getList();
        require "Views\createNewCasting.php";
    }

    public function pushCast($c)
    {
        $dbd = daoconnect();
        $man = new CastManager($dbd);
        $man->add($c);
    }

    public function deleteView()
    {
        $dbd = daoconnect();
        $man = new MovieManager($dbd);
        $list = $man->getList();
        require "Views\deleteMovieView.php";
    }

    public function deleteOne($id)
    {
        $dbd = daoconnect();
        $man = new MovieManager($dbd);
        $man->delete($id);
    }

    public function editView()
    {
        $dbd = daoconnect();
        $man = new MovieManager($dbd);
        $list = $man->getList();
        require "Views\\editMovieView.php";
    }

    public function editPlacehold($i)
    {
        $dbd = daoconnect();
        $man = new MovieManager($dbd);
        $target = $man->get($i);
        $man_d = new DirectorManager($dbd);
        $man_g = new GenreManager($dbd);
        $d = $man_d->get($target->getID_D());
        $g = $man_g->get($target->getID_G());
        $l_d = $man_d->getList();
        $l_g = $man_g->getList();
        return array(
            "target" => $target,
            "dir" => $d,
            "gen" => $g,
            "dirlist" => $l_d,
            "genlist" => $l_g
        );
    }
}

