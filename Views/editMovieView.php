<?php $titre = "Edition d'un film"; ?>

<?php ob_start();?>

<div class="container" id="ajax">
    <h3>Retirer un film</h3>
    
        <form method="POST" action="editMovieAnnex.php" id="crud-c">
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
        <button type="submit" form="crud-c" value="Submit" id="sub">Submit</button>
    
</div>

<script>
    $('#sub').click(function(event){
        $.post("editMovieAnnex.php", { mov: $("#select-m").value }, function(data){
            $('#ajax').html(data)
        })
        event.preventDefault();
    })


    </script>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>