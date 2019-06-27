<?php $titre = "Création d'un nouveau film"; ?>

<?php ob_start();?>

<div class="container">
    <h3>Ajouter un nouveau Castinj</h3>
    
        <form method="POST" action="createCasting.php" id="crud-c">
        <div class="wrap-crud">
            <div>
                <label for="select-m">Film :</label>
                <select class="selectpicker" id="select-m" name="mov">
                    <?php foreach ($l_m as $i)
                    {
                        echo '<option value="' .$i->getID_F() . '">'. $i->getTitre() . '</option>';
                    }?>
                </select>
            </div>
            <div>
                <label for="select-r">Role :</label>
                <select class="selectpicker" id="select-r" name="rol">
                    <?php foreach ($l_r as $i)
                    {
                        echo '<option value="' .$i->getID() . '">' . $i . '</option>';
                    }?>
                </select>
            </div>
            <div>
                <label for="select-a">Acteur :</label>
                <select class="selectpicker" id="select-a" name="act">
                    <?php foreach ($l_a as $i)
                    {
                        echo '<option value="' .$i->getID() . '">'. $i . '</option>';
                    }?>
                </select>
            </div>
        </div>
        </form>
        <button type="submit" form="crud-c" value="Home" name="button">Submit</button>
        <button type="submit" form="crud-c" value="Self" name="button">Submit & Add New</button>
    
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>