<?php
require('functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FilmCollection</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,400;0,700;1,600;1,800&display=swap"
    rel="stylesheet">
</head>

<body>
<a name="Film"> </a>
<div class="titleBar">
    <div class="welcome">
        <h1>Film Collection</h1>
        <p>Welcome to my film collection!</p>
    </div>
    <a id="newFilm" class="newFilm" href="addTheFilm.php">+ Add more films</a>
</div>
<main>
<div class="container">
<?php
   $db = connectToDatabase();
   $films = getFilms($db);
   $genres = extract_genres_from_db($db);
   $languages = extract_originalLanguage_from_db($db);
   $distributors = extract_distributor_from_db($db);
   echo addItemToHTML($films, $genres, $distributors, $languages);
   ?>
</div>
</main>
<footer class="goToTop">
    <a href="#Film"> <img src="images/video.png"  alt="" class="home"> </a>
    <div class="text"> © 2022 Fatima Stanley </div>
</footer>
</body>

