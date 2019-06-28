<?php

require_once "Controllers\ControllerRole.php";

$id = $_POST['mov'];
$ctrl = new ControllerRole();
$ctrl->deleteOne($id);
header("Location: index.php");