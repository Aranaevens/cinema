<?php

require_once "Controllers\ControllerActor.php";
require_once "Controllers\ControllerDirector.php";
require_once "Controllers\ControllerGenre.php";
require_once "Controllers\ControllerMovie.php";
require_once "Controllers\ControllerRole.php";

function home()
{
    require 'Views\viewIndex.php';
}

$ctrla = new ControllerActor();
$ctrld = new ControllerDirector();
$ctrlg = new ControllerGenre();
$ctrlm = new ControllerMovie();
$ctrlr = new ControllerRole();

try{
    if (isset($_GET['controller']))
    {
        if ($_GET['controller'] == 'actor')
        {
            if(isset($_GET['n']))
            {
                header("Location: navActor.php?n=" . $_GET['n']);
            }
            else
            {
                header("Location: navActor.php");
            }
        }
        else if ($_GET['controller'] == 'director')
        {
            if(isset($_GET['n']))
            {
                header("Location: navDirector.php?n=" . $_GET['n']);
            }
            else
            {
                header("Location: navDirector.php");
            }
        }
        else if ($_GET['controller'] == 'genre')
        {
            if(isset($_GET['n']))
            {
                header("Location: navGenre.php?n=" . $_GET['n']);
            }
            else
            {
                header("Location: navGenre.php");
            }
        }
        else if ($_GET['controller'] == 'Movie')
        {
            if(isset($_GET['n']))
            {
                header("Location: navMovie.php?n=" . $_GET['n']);
            }
            else
            {
                header("Location: navMovie.php");
            }
        }
        else if ($_GET['controller'] == 'role')
        {
            if(isset($_GET['n']))
            {
                header("Location: navRole.php?n=" . $_GET['n']);
            }
            else
            {
                header("Location: navRole.php");
            }
        }
        else
            throw new Exception("Invalid controller.");
    }
    else
        home();
}

catch (Exception $e)
{
    erreur($e->getMessage());
}