<?php $titre = "Création d'un nouvel acteur"; ?>

<?php ob_start();?>

<div class="container">
    <h3>Ajouter un nouvel Acteur</h3>
    
        <form method="POST" action="createActor.php" id="crud-a">
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
                <label for="genre">Genre :</label><br />
                <input type="radio" name="genre" value="0"> Homme<br />
                <input type="radio" name="genre" value="1"> Femme<br />
            </div>
            <div>
                    <label for="release">Date de naissance :</label>
                    <input type="date" id="release" name="naissance">
            </div>
        </div>
        </form>
        <button type="submit" form="crud-a" value="Submit">Submit</button>
    
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>