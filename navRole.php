<?php

require_once "Controllers\ControllerRole.php";

$ctrlr = new ControllerRole();

try{
    if(isset($_GET['n']))
    {
        $ctrlr->viewFilmography($_GET['n']);
    }
    else if(isset($_GET['crud']))
    {
        if($_GET['crud'] == 'create')
        {
            $ctrlr->createNewView();
        }
        else if($_GET['crud'] == 'delete')
        {
            $ctrlr->deleteView();
        }
        else if($_GET['crud'] == 'edit')
        {
            $ctrlr->editView();
        }
    }
    else
    {
        $ctrlr->listRole();
    }
}

catch (Exception $e)
{
    echo $e->getMessage();
}