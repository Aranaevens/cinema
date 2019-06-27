<?php $titre = "Création d'un nouveau genre"; ?>

<?php ob_start();?>

<div class="container">
    <h3>Ajouter un nouveau Genre</h3>
    
        <form method="POST" action="createGenre.php" id="crud-g">
        <div class="wrap-crud">
            <p>
                <label for="intitule">Intitulé :</label>
                <input type="text" id="intitule" name="intitule" maxlength="99">
            </p>
        </div>
        </form>
        <button type="submit" form="crud-g" value="Submit">Submit</button>
    
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>