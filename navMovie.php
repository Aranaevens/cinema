<?php

require_once "Controllers\ControllerMovie.php";

$ctrlm = new ControllerMovie();

try{
    if(isset($_GET['n']))
    {
        if(isset($_GET['action']))
        {
            if($_GET['action'] == 'casting')
            {
                $ctrlm->viewActors($_GET['n']);
            }
            else if($_GET['action'] == 'details')
            {
                $ctrlm->viewDetails($_GET['n']);
            }
            else
            {
                throw new Exception("Invalid action passed to Movie Controller.");
            }
        }
        else
        {
            throw new Exception("Controller needs an action with the number.");
        }
    }
    else if(isset($_GET['crud']))
    {
        if($_GET['crud'] == 'create')
        {
            $ctrlm->createNewView();
        }
        else if($_GET['crud'] == 'casting')
        {
            $ctrlm->createNewCasting();
        }
        else if($_GET['crud'] == 'delete')
        {
            $ctrlm->deleteView();
        }
        else if($_GET['crud'] == 'edit')
        {
            $ctrlm->editView();
        }
        else
        {
            throw new Exception("Invalid action passed to Movie Controller.");
        }
    }
    else
    {
        $ctrlm->listMovie();
    }
}

catch (Exception $e)
{
    echo $e->getMessage();
}