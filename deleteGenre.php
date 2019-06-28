<?php

require_once "Controllers\ControllerGenre.php";

$id = $_POST['mov'];
$ctrl = new ControllerGenre();
$ctrl->deleteOne($id);
header("Location: index.php");