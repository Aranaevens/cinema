<?php

require_once "Controllers\ControllerActor.php";

$id = $_POST['mov'];
$ctrl = new ControllerActor();
$ctrl->deleteOne($id);
header("Location: index.php");