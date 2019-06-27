<?php $titre = "Création d'un nouveau réalisateur"; ?>

<?php ob_start();?>

<div class="container">
    <h3>Ajouter un nouveau Réalisateur</h3>
    
        <form method="POST" action="createDirector.php" id="crud-d">
        <div class="wrap-crud">
            <p>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" maxlength="99">
            </p>
            <p>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" maxlength="99">
            </p>
            <div>
                    <label for="release">Date de naissance :</label>
                    <input type="date" id="release" name="naissance">
            </div>
        </div>
        </form>
        <button type="submit" form="crud-d" value="Submit">Submit</button>
    
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>