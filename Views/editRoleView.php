<?php $titre = "Edition d'un role"; ?>

<?php ob_start();?>

<div class="container" id="ajax">
    <h3>Editer un role</h3>
    
        <form method="POST" action="editRoleAnnex.php" id="crud-c">
        <div class="wrap-crud">
            <div>
                <label for="select-m">Role :</label>
                <select class="selectpicker" id="select-m" name="mov">
                    <?php foreach ($list as $i)
                    {
                        echo '<option value="' .$i->getID() . '">'. $i . '</option>';
                    }?>
                </select>
            </div>
        </div>
        </form>
        <button type="submit" form="crud-c" value="Submit" id="sub">Submit</button>
    
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>