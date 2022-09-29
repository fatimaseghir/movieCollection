<?php
require_once 'functions.php';
$db = connectToDatabase();
$genres = extract_genres_from_db($db);
$languages = extract_originalLanguage_from_db($db);
$distributors = extract_distributor_from_db($db);
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
<main class="newFilm">
    <a name="newFilm"> </a>
    <div class = "userForm">
        <h1 id="form">Add the film to the film collection</h1>
        <form class="form" method="post" action="addToDB.php">
            <div class="form1">
                <label for="title">Title:</label>
                <input type="text" name="title" placeholder="e.g. Dune" required>
            </div>
            <div class="form1">
            <label for="director">Director:</label>
            <input type="text" name="director" placeholder="-" required>
            </div>
            <div class="form1">
            <label for="producer">Producer:</label>
            <input type="text" name="producer" placeholder="-" required>
            </div>
            <div class="form1">
            <label for="writer">Writer:</label>
            <input type="text" name="writer" placeholder="-" required>
            </div>
            <div class="form1">
            <label for="genre">Genre:</label>
            <select id="genre" name="genre" required>
                 <?php foreach($genres as $genre){
                    echo '<option value="' . $genre['id'] . '">' . $genre['genre1'] . '</option>';
                 }; ?>
            </select>
            </div>

            <div class="form1">
            <label for="language">Language:</label>
            <select id="language" name="original_language" required>
                <?php foreach($languages as $language){
                    echo '<option value="' . $language['id'] . '">' . $language['original_language1'] . '</option>';
                }; ?>
            </select>
            </div>

            <div class="form1">
            <label for="distributor">Distributor:</label>
            <select id="distributor" name="distributor" required>
                <?php foreach($distributors as $distributor){
                    echo '<option value="' . $distributor['id'] . '">' . $distributor['distributor1'] . '</option>';
                }; ?>
            </select>
            </div>

            <div class="form1">
            <label for="release_date_theatres">Release date (theatres):</label>
            <input type="text" class="release_date_theatres" name="release_date_theatres" placeholder="-" required>
            </div>
            <div class="form1">
            <label for="release_date_streaming">Release date (streaming):</label>
            <input type="text" class="release_date_streaming" name="release_date_streaming" placeholder="-" required>
            </div>
            <div class="form1">
            <label for="runtime">Runtime:</label>
            <input type="text" class="runtime" name="runtime" placeholder="-" required>
            </div>
            <input type="submit" value="submit" class="submit">
        </form>
</main>
<footer class="goToTop">
    <a href="#newFilm"> <img src="images/video.png" alt="image"></a>
    <div class="text"> © 2022 Fatima Stanley </div>
</footer>
</body>
