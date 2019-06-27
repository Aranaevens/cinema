<?php $titre = "Détails de $target"; ?>

<?php ob_start();?>

<div class="container">
    <h3>Détails de <?= $target->getTitre()?></h3>
    <article>
        <img src="<?=$target->getImg()?>" alt="movie banner" style="display:block;max-height:30em;margin-left:auto;margin-right:auto;margin-top:0.5em;margin-bottom:0.5em;" />
        <h4>Titre<h4>
        <p><?php echo $target->getTitre();?></p>
        <h4>Durée</h4>
        <p><?php echo $target->getDuree();?> minutes</p>
        <h4>Réalisateur</h4>
        <p><?php echo $dir;?></p>
        <h4>Genre</h4>
        <p><?php echo $gen;?></p>
        <h4>Année de sortie française</h4>
        <p><?php echo $target->getDate()->format("Y");?></p>
        <h4>Acteurs notables</h4>
        <p>
        <?php 
        $len = count($act);
        for ($i=0; $i<$len; $i++)
        {
            if ($i == $len - 1)
                echo $act[$i];
            else
                echo $act[$i] . ', ';
        }
        ?>
        </p>

    </article>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>