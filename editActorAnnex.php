<?php $titre = "Edition d'un acteur"; 

require_once "C:\wamp64\www\cinema\Controllers\ControllerActor.php";

$id = $_POST['mov'];
$ctrl = new ControllerActor();
$arr = $ctrl->editPlacehold($id);
$tar = $arr['target'];?>

<?php ob_start();?>

<div class="container">
    <h3>Editer un Acteur</h3>
    
        <form method="POST" action="updateActor.php" id="crud-a">
        <div class="wrap-crud">
            <p>
                <label for="prenom">Prénom :</label>
                <input placeholder="<?= $tar->getPrenom(); ?>" type="text" id="prenom" name="prenom" maxlength="99">
            </p>
            <p>
                <label for="nom">Nom :</label>
                <input placeholder="<?= $tar->getNom(); ?>" type="text" id="nom" name="nom" maxlength="99">
            </p>
            <div>
                <label for="genre">Genre :</label><br />
                <?php if ($tar->getGender())
                {
                    echo '<input type="radio" name="genre" value="0"> Homme<br />
                    <input type="radio" name="genre" value="1" checked="checked"> Femme<br />';
                }
                else
                {
                    echo '<input type="radio" name="genre" value="0" checked="checked"> Homme<br />
                    <input type="radio" name="genre" value="1"> Femme<br />';
                }?>
            </div>
            <div>
                    <label for="release">Date de naissance :</label>
                    <input type="date" id="release" name="naissance" value=<?= $tar->getBirth()->format('Y-m-d');?>>
            </div>
        </div>
        </form>
        <button type="submit" form="crud-a" value="Submit">Submit</button>
    
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>