<?php $titre = "Création d'un nouveau film"; ?>

<?php ob_start();?>

<div class="container">
    <h3>Ajouter un nouveau Film</h3>
    
        <form method="POST" action="createMovie.php" id="crud-c">
        <div class="wrap-crud">
            <p>
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" maxlength="99">
            </p>
            <p>
                <label for="image">Lien de l'affiche :</label>
                <input type="text" id="image" name="img">
            </p>
            <p>
                <label for="duree">Durée (en minutes) :</label>
                <input type="number" id="duree" name="duration">
            </p>
            <div>
                <label for="select-d">Réalisateur :</label>
                <select class="selectpicker" id="select-d" name="dir">
                    <?php foreach ($l_d as $i)
                    {
                        echo '<option value="' .$i->getID() . '">'. $i . '</option>';
                    }?>
                </select>
                <a href="navDirector.php?crud=create"><i class="fas fa-plus-circle"></i></a>
            </div>
            <div>
                <label for="select-g">Genre :</label>
                <select class="selectpicker" id="select-g" name="gen">
                    <?php foreach ($l_g as $i)
                    {
                        echo '<option value="' .$i->getID() . '">' . $i . '</option>';
                    }?>
                </select>
                <a href="navGenre.php?crud=create"><i class="fas fa-plus-circle"></i></a>
            </div>
            <div>
                    <label for="release">Date de sortie du film :</label>
                    <input type="date" id="release" name="release">
            </div>
        </div>
        </form>
        <button type="submit" form="crud-c" value="Submit">Submit</button>
    
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>