<?php

require_once "Controllers\ControllerDirector.php";

$ctrld = new ControllerDirector();

try{
    if(isset($_GET['n']))
    {
        $ctrld->viewFilmography($_GET['n']);
    }
    else if(isset($_GET['crud']))
    {
        if($_GET['crud'] == 'create')
        {
            $ctrld->createNewView();
        }
        // else if($_GET['crud'] == 'delete')
        // {
        //     $ctrlm->delMovieView();
        // }
    }
    else
    {
        $ctrld->listDirector();
    }
}
catch (Exception $e)
{
    erreur($e->getMessage());
}