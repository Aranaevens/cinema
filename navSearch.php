<?php

require_once "Controllers\ControllerSearch.php";

$ctrlr = new ControllerSearch();

try{
    if(isset($_GET['search']))
    {
        $ctrlr->showResults();
    }
    else
    {
        throw new Exception("Something happened with the research");
    }
}

catch (Exception $e)
{
    erreur($e->getMessage());
}

?>