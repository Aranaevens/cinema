<?php $titre = "Liste des films"; ?>

<?php ob_start();?>

<div class="container">
    <h2 style="text-align:center;">Liste des films</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Réalisateur</th>
                <th>Durée</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
<?php

foreach($list as $i)
{
    $o = $i[1];
    echo '<tr>
            <td>' . $i[0]->getTitre() . '</td>
            <td onclick="window.location=\'navDirector.php?&n=' . $o . '\'" style="font-weight:normal;">' . $i[1] . '</td>
            <td>' . $i[0]->durationFormatted() . '</td>
            <td><a href="navMovie.php?action=casting&n=' . $i[0]->getID_F() . '" class="btn btn-light">Casting</a></td>
            <td><a href="navMovie.php?action=details&n=' . $i[0]->getID_F() . '" class="btn btn-light">Détails</a></td>
            </tr>';
}
?>

            </tbody>
        </table>
        <!-- <div class="to-pdf"><p>Pour afficher sous forme de PDF : <a href="pdfforma.php" target="_blank"><i class="far fa-file-pdf"></i></a></p></div> -->
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>