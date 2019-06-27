<?php
?>

<?php $titre = "Résultat de recherche"; ?>

<?php ob_start();

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

$plainSearch = htmlspecialchars($_GET['search']);
$arrSearch = explode(' ', $plainSearch);
?>

<div class="container">
    <h3>Résultats de recherche</h3>
    <article>
<?php

foreach($arrSearch as $i)
{
    $movies = getArrayMovieByOccurence($i);
    if (count($movies) > 0)
    {
        echo '<h4>Films contenant \'' . $i . '\' :</h4>';
        echo '<table class="table table-striped"><thead></thead><tbody>';
        $n = 0;
        foreach ($movies as $j)
        {
            $o = getIndexOfDirectorByObject($j->getDirector());
            echo '<tr>
                <td>' . $j->getTitle() . '</td>
                <td onclick="window.location=\'navDirector.php?&n=' . $o . '\'" style="font-weight:normal;">' . $j->getDirector() . '</td>
                <td>' . $j->durationFormatted() . '</td>
                <td><a href="navMovie.php?action=casting&n=' . $n . '" class="btn btn-light">Casting</a></td>
                <td><a href="navMovie.php?action=details&n=' . $n . '" class="btn btn-light">Détails</a></td>
                </tr>';
            $n++;
        }
        echo '</tbody></table><hr />';
    }

    $actors = getArrayActorByOccurence($i);
    if (count($actors) > 0)
    {
        echo '<h4>Acteurs contenant \'' . $i . '\' :</h4>';
        echo '<table class="table table-striped"><thead></thead><tbody>';
        $n = 0;
        foreach ($actors as $j)
        {
            echo '<tr>
            <td onclick="window.location=\'navActor.php?n=' . $n . '\'">' . $j . '</td>
            </tr>';
            $n++;
        }
        echo '</tbody></table><hr />';
    }

    $directors = getArrayDirectorByOccurence($i);
    if (count($directors) > 0)
    {
        echo '<h4>Réalisateurs contenant \'' . $i . '\' :</h4>';
        echo '<table class="table table-striped"><thead></thead><tbody>';
        $n = 0;
        foreach ($directors as $j)
        {
            echo '<tr>
            <td onclick="window.location=\'navDirector.php?n=' . $n . '\'">' . $j . '</td>
            </tr>';
            $n++;
        }
        echo '</tbody></table><hr />';
    }

    $genres = getArrayGenreByOccurence($i);
    if (count($genres) > 0)
    {
        echo '<h4>Genres contenant \'' . $i . '\' :</h4>';
        echo '<table class="table table-striped"><thead></thead><tbody>';
        $n = 0;
        foreach ($genres as $j)
        {
            echo '<tr>
            <td onclick="window.location=\'navGenre.php?n=' . $n . '\'">' . $j . '</td>
            </tr>';
            $n++;
        }
        echo '</tbody></table><hr />';
    }

    $roles = getArrayRoleByOccurence($i);
    if (count($roles) > 0)
    {
        echo '<h4>Roles contenant \'' . $i . '\' :</h4>';
        echo '<table class="table table-striped"><thead></thead><tbody>';
        $n = 0;
        foreach ($roles as $j)
        {
            echo '<tr>
            <td onclick="window.location=\'navRole.php?n=' . $n . '\'">' . $j . '</td>
            </tr>';
            $n++;
        }
        echo '</tbody></table><hr />';
    }
}
?>

    </article>
        <!-- <div class="to-pdf"><p>Pour afficher sous forme de PDF : <a href="pdfforma.php" target="_blank"><i class="far fa-file-pdf"></i></a></p></div> -->
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require "Views\layout.php"; ?>