
<?php $titre = "Liste des films de $target"; ?>

<?php ob_start();
?>

<div class="container">
    <h3>Liste des films dans le genre <?php echo $target . " (" . count($list) . ")"; ?></h3>
    <ul>
<?php

foreach($list as $i)
{
    echo '<li>' . $i . "</li><br />";
            // <td><a href="?controller=formations&i=' . $n . '" class="btn btn-light">Détails</a></td>
}
?>

    </ul>
        <!-- <div class="to-pdf"><p>Pour afficher sous forme de PDF : <a href="pdfforma.php" target="_blank"><i class="far fa-file-pdf"></i></a></p></div> -->
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>