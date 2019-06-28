<?php

require_once "Controllers\ControllerDirector.php";
require_once 'Models\Director.php';
$arr = array('NOM_ACTOR' => $_POST['nom'], 'PRENOM_ACTOR' => $_POST['prenom'], 'BIRTH_ACTOR' => $_POST['naissance']);
$new_obj = new Director($arr);
$ctrl = new ControllerDirector();
$ctrl->pushNew($new_obj);
header("Location: index.php");