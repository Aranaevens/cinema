<?php

require_once "Controllers\ControllerMovie.php";
require_once 'Models\Movie.php';
$arr = array('TITRE_FILM' => $_POST['titre'], 'ID_DIRECTOR' => $_POST['dir'], 'ID_GENRE' => $_POST['gen'], 'DUREE_FILM' => $_POST['duration'], 'IMG_FILM' => $_POST['img'], 'DATE_FILM' => $_POST['release']);
$new_obj = new Movie($arr);
$ctrl = new ControllerMovie();
$ctrl->createIn($new_obj);
header("Location: navMovie.php?crud=casting");