<?php

require_once 'Models\Movie.php';
require_once 'Models\Actor.php';
require_once 'Models\Director.php';
require_once 'Models\Cast.php';


class ControllerSearch
{
    private $init;

    public function __construct()
    {
        $this->init = false;
        $this->dbinit();
    }

    public function dbinit()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if (!$this->init && !isset($_SESSION["Init"]))
        {
            
            $dir_arr = directorParse();
            $_SESSION["Directors"] = $dir_arr;
            $act_arr = actorParse();
            $_SESSION["Actors"] = $act_arr;
            $genr_arr = genreParse();
            $_SESSION["Genres"] = $genr_arr;
            $mov_arr = movieParse();
            $_SESSION["Movies"] = $mov_arr;
            $rol_arr = roleParse();
            $_SESSION["Roles"] = $rol_arr;
            $cas_arr = castParse();
            $_SESSION["Casts"] = $cas_arr;

            foreach($mov_arr as $mov)
            {
                $castsForThatOne = getArrayCastByMovieName($mov->getTitle());
                foreach($castsForThatOne as $cast)
                {
                    $mov->addCast($cast);
                }
            }
            $_SESSION["Movies"] = $mov_arr;
            $_SESSION["Init"] = true;
        }
        $this->init = true;
    }

    public function showResults()
    {
        require "Views\Search.php";
    }
}
?>