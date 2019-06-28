<?php $titre = "Edition d'un role"; 

require_once "C:\wamp64\www\cinema\Controllers\ControllerRole.php";

$id = $_POST['mov'];
$ctrl = new ControllerRole();
$arr = $ctrl->editPlacehold($id);
$tar = $arr['target'];?>

<?php ob_start();?>

<div class="container">
    <h3>Editer un Role</h3>
    
        <form method="POST" action="updateRole.php" id="crud-a">
        <div class="wrap-crud">
        <p>
                <label for="intitule">Intitulé :</label>
                <input type="text" id="intitule" name="intitule" maxlength="99" placeholder=<?= $tar->getNom();?>>
            </p>
        </div>
        </form>
        <button type="submit" form="crud-a" value="Submit">Submit</button>
    
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>