<?php

require_once "Controllers\ControllerActor.php";
require_once 'Models\Actor.php';
$arr = array('NOM_ACTOR' => $_POST['nom'], 'PRENOM_ACTOR' => $_POST['prenom'], 'BIRTH_ACTOR' => $_POST['naissance'], 'GENRE_ACTOR' => $_POST['genre']);
$new_obj = new Actor($arr);
$ctrl = new ControllerActor();
$ctrl->pushNew($new_obj);
header("Location: index.php");