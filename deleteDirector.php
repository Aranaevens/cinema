<?php

require_once "Controllers\ControllerDirector.php";

$id = $_POST['mov'];
$ctrl = new ControllerDirector();
$ctrl->deleteOne($id);
header("Location: index.php");