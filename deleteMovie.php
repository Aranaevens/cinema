<?php

require_once "Controllers\ControllerMovie.php";

$id = $_POST['mov'];
$ctrl = new ControllerMovie();
$ctrl->deleteOne($id);
header("Location: index.php");