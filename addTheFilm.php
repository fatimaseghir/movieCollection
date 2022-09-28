<?php
require('functions.php');
$db = connectToDatabase('filmcoll');
$genres = extract_genres_from_db($db);
$languages = extract_originalLanguage_from_db($db);
$distributors = extract_distributor_from_db($db);
?>

<!DOCTYPE html>
<html lang="en">

<!--  head section -->

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
<main class="newFilm" >
    <a name="newFilm"> </a>
    <div class = "userForm">
        <h1 id="form">Add the film to the film collection  </h1>
        <form class="form"   method="POST" action="addToDb.php">
            <label for="title">Title:</label>
            <input type="text" class="title" name="title" placeholder="e.g. Dune" required>
            <label for="director">Director:</label>
            <input type="text" class="director" name="director" placeholder="-" required>
            <label for="producer">Producer:</label>
            <input type="text" class="producer" name="producer" placeholder="-" required>
            <label for="writer">Writer:</label>
            <input type="text" class="writer" name="writer" placeholder="-" required>
            <label for="genre">Genre:</label>
            <select id="genre" name="genre" required>
                 <?php foreach($genres as $genre){
                    echo '<option value="' . $genre['id'] . '">' . $genre['genre1'] . '</option>';
                    }; ?>
            </select>

            <label for="language">Language:</label>
            <select id="language" name="language" required>
                <?php foreach($languages as $language){
                    echo '<option value="' . $language['id'] . '">' . $language['original_language1'] . '</option>';
                    }; ?>
            </select>

            <label for="distributor">Distributor:</label>
            <select id="distributor" name="distributor" required>
                <?php foreach($distributors as $distributor){
                    echo '<option value="' . $distributor['id'] . '">' . $distributor['distributor1'] . '</option>';
                }; ?>
            </select>

             <label for="release_date_theatres">Release date (theatres):</label>
            <input type="text" class="release_date_theatres" name="release_date_theatres" placeholder="-" required>
            <label for="release_date_streaming">Release date (streaming):</label>
            <input type="text" class="release_date_streaming" name="release_date_streaming" placeholder="-" required>
            <label for="runtime">Runtime:</label>
            <input type="text" class="runtime" name="runtime" placeholder="-" required>
            <input type="submit" class="submit">
        </form>

</main>
<footer class="goToTop">
    <a href="#newFilm"> <img src="images/video.png"  alt="" class="home"> </a>
    <div class="text"> © 2022 Fatima Stanley </div>
</footer>
</body>
