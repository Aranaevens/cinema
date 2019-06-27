<?php $titre = "Liste des genres"; ?>

<?php ob_start();
?>

<div class="container">
    <h2 style="text-align:center;">Liste des genres</h2>
        <table class="table table-striped">
            <thead>
            <!-- <tr>
                <th>Nom de l'acteur</th>
                <th>Début</th>
            </tr> -->
            </thead>
            <tbody>
<?php
foreach($list as $i)
{
    echo '<tr>
            <td onclick="window.location=\'?n=' . $i->getID() . '\'">' . $i . '</td>
            </tr>';
            // <td><a href="?controller=formations&i=' . $n . '" class="btn btn-light">Détails</a></td>
}
?>

            </tbody>
        </table>
        <!-- <div class="to-pdf"><p>Pour afficher sous forme de PDF : <a href="pdfforma.php" target="_blank"><i class="far fa-file-pdf"></i></a></p></div> -->
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>