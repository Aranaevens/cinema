<?php

require_once "Controllers\ControllerGenre.php";

$ctrlg = new ControllerGenre();

try{
    if(isset($_GET['n']))
    {
        $ctrlg->viewFilmography($_GET['n']);
    }
    else if(isset($_GET['crud']))
    {
        if($_GET['crud'] == 'create')
        {
            $ctrlg->createNewView();
        }
        else if($_GET['crud'] == 'delete')
        {
            $ctrlg->deleteView();
        }
        else if($_GET['crud'] == 'edit')
        {
            $ctrlg->editView();
        }
    }
    else
    {
        $ctrlg->listGenre();
    }
}

catch (Exception $e)
{
    erreur($e->getMessage());
}