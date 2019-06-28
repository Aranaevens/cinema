<!DOCTYPE html>
<html lang=fr>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="FakeMDB">
  <meta name="author" content="Nicolas EISENBERG">
  <title><?= $titre ?></title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="css/mycss.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
</head>

<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<header>
<nav class ="navbar navbar-expand-sm navbar-light bg-light">
    <div class="collapse navbar-collapse" id="NavWrap">
    <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="index.php?">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item"><a class="nav-link" href="navActor.php">Acteurs</a></li>
    <li class="nav-item"><a class="nav-link" href="navDirector.php">Réalisateurs</a></li>
    <li class="nav-item"><a class="nav-link" href="navGenre.php">Genres</a></li>
    <li class="nav-item"><a class="nav-link" href="navMovie.php">Movie</a></li>
    <li class="nav-item"><a class="nav-link" href="navRole.php">Roles</a></li>
    <li class="nav-item">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Create
        </button>  
        <div class="dropdown-menu">
        <a class="dropdown-item" href="navMovie.php?crud=create">Film</a>
        <a class="dropdown-item" href="navActor.php?crud=create">Acteur</a>
        <a class="dropdown-item" href="navDirector.php?crud=create">Réalisateur</a>
        <a class="dropdown-item" href="navGenre.php?crud=create">Genre</a>
        <a class="dropdown-item" href="navRole.php?crud=create">Role</a>
        <a class="dropdown-item" href="navMovie.php?crud=casting">Casting</a>
        </div>
    </div>
    </li>
    <li class="nav-item"><div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Delete
        </button>  
        <div class="dropdown-menu">
        <a class="dropdown-item" href="navMovie.php?crud=delete">Film</a>
        <a class="dropdown-item" href="navActor.php?crud=delete">Acteur</a>
        <a class="dropdown-item" href="navDirector.php?crud=delete">Réalisateur</a>
        <a class="dropdown-item" href="navGenre.php?crud=delete">Genre</a>
        <a class="dropdown-item" href="navRole.php?crud=delete">Role</a>
        </div>
    </div></li>
    <li class="nav-item"><div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Edit
        </button>  
        <div class="dropdown-menu">
        <a class="dropdown-item" href="navMovie.php?crud=edit">Film</a>
        <a class="dropdown-item" href="navActor.php?crud=edit">Acteur</a>
        <a class="dropdown-item" href="navDirector.php?crud=edit">Réalisateur</a>
        <a class="dropdown-item" href="navGenre.php?crud=edit">Genre</a>
        <a class="dropdown-item" href="navRole.php?crud=edit">Role</a>
        </div></li>
    </ul>
    <div class="search-container">
    <form action="navSearch.php" method="GET">
      <input type="text" placeholder="Rechercher..." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    </div>
    </div>
</nav>
</header>
<main>
<?= $contenu ?>
</main>
</html>
</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
<script src="js\map.js"></script>