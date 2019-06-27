
<?php $titre = "Liste des films de $target"; ?>

<?php ob_start();
?>

<div class="container">
    <h3>Filmographie de <?= $target?></h3>
    <h4> Nombre de films <span class="round-nb"><?php echo count($list); ?></span></h4>
    <table>
        <thead></thead>
        <tbody>
<?php

foreach($list as $i)
{
    echo '<tr><td>' . $i . "</td></tr>";
            // <td><a href="?controller=formations&i=' . $n . '" class="btn btn-light">Détails</a></td>
}
?>

        </tbody>
    </table>
        <!-- <div class="to-pdf"><p>Pour afficher sous forme de PDF : <a href="pdfforma.php" target="_blank"><i class="far fa-file-pdf"></i></a></p></div> -->
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>