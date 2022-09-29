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
    $db = connectToDatabase();
    add_to_db($_POST, $db);
    header('location: index.php');
}