<?php

require_once "Controllers\ControllerGenre.php";
require_once 'Models\Genre.php';
$arr = array('NOM_GENRE' => $_POST['intitule']);
$new_obj = new Genre($arr);
$ctrl = new ControllerGenre();
$ctrl->pushNew($new_obj);
header("Location: index.php");