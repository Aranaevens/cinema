<?php

require_once "C:\wamp64\www\cinema\Controllers\ControllerMovie.php";

$id = $_POST['mov'];
$ctrl = new ControllerMovie();
$arr = $ctrl->editPlacehold($id);
$tar = $arr['target'];
$dir = $arr['dir'];
$gen = $arr['gen'];
$l_d = $arr['dirlist'];
$l_g = $arr['genlist'];
?>

<?php $titre = "Edition du film" . $tar->getTitre(); ?>

<?php ob_start();?>

<div class="container">
    <h3>Edition de <?= $tar->getTitre() ;?></h3>
    
        <form method="POST" action="createMovie.php" id="crud-c">
        <div class="wrap-crud">
            <p>
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" maxlength="99" placeholder="<?=$tar->getTitre();?>">
            </p>
            <p>
                <label for="image">Lien de l'affiche :</label>
                <input type="text" id="image" name="img" placeholder="<?=$tar->getImg();?>">
            </p>
            <p>
                <label for="duree">Durée (en minutes) :</label>
                <input type="number" id="duree" name="duration" placeholder="<?=$tar->getDuree();?>">
            </p>
            <div>
                <label for="select-d">Réalisateur :</label>
                <select class="selectpicker" id="select-d" name="dir">
                    <?php foreach ($l_d as $i)
                    {
                        if ($i->getID() == $dir->getID())
                        {
                            echo '<option value="' .$i->getID() . '" selected>'. $i . '</option>';
                        }
                        else
                        {
                            echo '<option value="' .$i->getID() . '">'. $i . '</option>';
                        }
                    }?>
                </select>
                <a href="navDirector.php?crud=create"><i class="fas fa-plus-circle"></i></a>
            </div>
            <div>
                <label for="select-g">Genre :</label>
                <select class="selectpicker" id="select-g" name="gen">
                    <?php foreach ($l_g as $i)
                    {
                        if ($i->getID() == $gen->getID())
                        {
                            echo '<option value="' .$i->getID() . '" selected>'. $i . '</option>';
                        }
                        else
                        {
                            echo '<option value="' .$i->getID() . '">' . $i . '</option>';
                        }
                    }?>
                </select>
                <a href="navGenre.php?crud=create"><i class="fas fa-plus-circle"></i></a>
            </div>
            <div>
                    <label for="release">Date de sortie du film :</label>
                    <input type="date" id="release" name="release" value=<?= $tar->getDate()->format('Y-m-d');?>>
            </div>
        </div>
        </form>
        <button type="submit" form="crud-c" value="Submit">Submit</button>
    
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>
