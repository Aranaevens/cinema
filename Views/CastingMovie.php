<?php $titre = "Liste des acteurs de $target"; ?>

<?php ob_start();?>

<div class="container">
    <h3>Liste des acteurs de <strong><?= $target->getTitre()?></strong></h3>
    <article>
<?php

foreach($list as $i)
{
    echo $i[0] . ' (' . $i[1] . ')<br />';
            // <td><a href="?controller=formations&i=' . $n . '" class="btn btn-light">Détails</a></td>
}
?>

    </article>
        <!-- <div class="to-pdf"><p>Pour afficher sous forme de PDF : <a href="pdfforma.php" target="_blank"><i class="far fa-file-pdf"></i></a></p></div> -->
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>