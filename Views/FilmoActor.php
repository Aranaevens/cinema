
<?php $titre = "Liste des films de $target"; ?>

<?php ob_start();?>

<div class="container">
    <h3>Liste des films de <?= $target?></h3>
    <article>
<?php

foreach($list as $i)
{
    echo '<strong>' . $i[1]->getNom() . "</strong> dans " . $i[0]->getTitre() . " (" . $i[0]->getDate()->format('Y') . ")<br />";
            // <td><a href="?controller=formations&i=' . $n . '" class="btn btn-light">Détails</a></td>
}
?>

    </article>
        <!-- <div class="to-pdf"><p>Pour afficher sous forme de PDF : <a href="pdfforma.php" target="_blank"><i class="far fa-file-pdf"></i></a></p></div> -->
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>