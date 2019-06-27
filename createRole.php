<?php

require_once "Controllers\ControllerRole.php";
require_once 'Models\Role.php';
$arr = array('NOM_ROLE' => $_POST['intitule']);
$new_obj = new Role($arr);
$ctrl = new ControllerRole();
$ctrl->pushNew($new_obj);
header("Location: index.php");