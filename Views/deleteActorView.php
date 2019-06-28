<?php $titre = "Suppression d'un acteur"; ?>

<?php ob_start();?>

<div class="container">
    <h3>Retirer un acteur</h3>
    
        <form method="POST" action="deleteActor.php" id="crud-c">
        <div class="wrap-crud">
            <div>
                <label for="select-m">Acteur :</label>
                <select class="selectpicker" id="select-m" name="mov">
                    <?php foreach ($list as $i)
                    {
                        echo '<option value="' .$i->getID() . '">'. $i . '</option>';
                    }?>
                </select>
            </div>
        </div>
        </form>
        <button type="submit" form="crud-c" value="Submit">Submit</button>
    
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>