<?php

require_once "Controllers\ControllerMovie.php";
require_once 'Models\Cast.php';
$arr = array('ID_ROLE' => $_POST['rol'], 'ID_FILM' => $_POST['mov'], 'ID_ACTOR' => $_POST['act']);
$new_obj = new Cast($arr);
$ctrl = new ControllerMovie();
$ctrl->pushCast($new_obj);
if ($_POST['button'] == "Home")
{
    header("Location: index.php");
}
else
{
    header("Location: navMovie.php?crud=casting");
}