<?php

require_once "Controllers\ControllerActor.php";

$ctrla = new ControllerActor();

try{
    if(isset($_GET['n']))
    {
        $ctrla->viewFilmography($_GET['n']);
    }
    else if(isset($_GET['crud']))
    {
        if($_GET['crud'] == 'create')
        {
            $ctrla->createNewView();
        }
        // else if($_GET['crud'] == 'delete')
        // {
        //     $ctrlm->delMovieView();
        // }
    }
    else
    {
        $ctrla->listActor();
    }
    
}

catch (Exception $e)
{
    $e->getMessage();
}