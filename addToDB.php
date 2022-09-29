<?php
require_once 'functions.php';

if (isset($_POST['title']) &&
    isset($_POST['genre']) &&
    isset($_POST['original_language']) &&
    isset($_POST['director']) &&
    isset($_POST['producer']) &&
    isset($_POST['writer']) &&
    isset($_POST['release_date_theatres']) &&
    isset($_POST['release_date_streaming']) &&
    isset($_POST['runtime']) &&
    isset($_POST['distributor'])

)
{
    if (!isset($itemFromQuery['img_location'])) {
        $itemFromQuery['img_location'] = 'images/dune.jpeg';
    }
    if (!validateDate($_POST['release_date_theatres'])) {
        $_POST['release_date_theatres'] = '2000-01-01';
    }
    if (!validateDate($_POST['release_date_streaming'])) {
        $_POST['release_date_streaming'] = '2000-01-01';
    }
    $db = connectToDatabase();
    add_to_db($_POST, $db);
    header('location: index.php');
}