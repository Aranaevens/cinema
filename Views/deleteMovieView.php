<?php $titre = "Suppression d'un film"; ?>

<?php ob_start();?>

<div class="container">
    <h3>Retirer un film</h3>
    
        <form method="POST" action="deleteMovie.php" id="crud-c">
        <div class="wrap-crud">
            <div>
                <label for="select-m">Film :</label>
                <select class="selectpicker" id="select-m" name="mov">
                    <?php foreach ($list as $i)
                    {
                        echo '<option value="' .$i->getID_F() . '">'. $i->getTitre() . '</option>';
                    }?>
                </select>
            </div>
        </div>
        </form>
        <button type="submit" form="crud-c" value="Submit">Submit</button>
    
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>