<?php $titre = "Liste des acteurs de $target"; ?>

<?php ob_start();?>

<div class="container">
    <h3>Liste des acteurs ayant incarnés <?= $target?></h3>
    <article>
    <table class="table table-striped"><thead></thead><tbody>
<?php
$current = '';
foreach($list as $i)
{
    if ($current != $i[1])
    {
        $current = $i[1];
        echo '<tr><td class="roledet">' . $i[1] . '</td><td>' . $i[0]->getTitre() . '</td></tr>';
    }
    else
    {
        echo '<tr><td class="roledet">' . '&nbsp' . '</td><td>' . $i[0]->getTitre() . '</td></tr>';
    }
}
?>
    </tbody></table>
    </article>
        <!-- <div class="to-pdf"><p>Pour afficher sous forme de PDF : <a href="pdfforma.php" target="_blank"><i class="far fa-file-pdf"></i></a></p></div> -->
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>