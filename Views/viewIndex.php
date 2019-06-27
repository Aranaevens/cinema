<?php $titre = "Liste des films"; ?>

<?php ob_start();?>

<div class="container">
    <h2 style="text-align:center;">Pranked, c'est pas IMDB o/</h2>
</div>

<div id="mapid"></div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>