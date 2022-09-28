<?php
//connect to database and return the $pdo connection as a variable --> to write a docblock
function connectToDatabase(): PDO
{
    $host = 'db';
    $db = 'filmcoll';
    $user = 'root';
    $password = 'password';
    $dsn = "mysql:host=$host;dbname=$db";
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
        $pdo = new PDO($dsn, $user, $password, $options);
    } catch (\PDOException $exception) {
        throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
    }
    return $pdo;
}
$pdo = connectToDatabase();


function getFilms(PDO $pdo): array
{
    $query = $pdo->prepare('SELECT `title`, `genre`, `original_language`, `director`, `producer`, `writer`, `release_date_theatres`, `release_date_streaming`,`runtime` ,`distributor`, `img_location` FROM `films` 
    JOIN `filmdistributor` ON `films`.`distributor`=`filmdistributor`.`id` 
    JOIN `filmlanguage` ON `films`.`original_language`=`filmlanguage`.`id` 
    JOIN `filmgenre` ON `films`.`genre`=`filmgenre`.`id`;');  //to return all player information to be indexed as needed
    $query->execute();
    return $query->fetchAll();
}


$filmsStatsArray = getFilms($pdo);



function addItemToHTML(array $dataFromQuery, array $genres, array $distributors, array $languages): string
{
    $result = '';
    foreach ($dataFromQuery as $itemFromQuery) {

        if (
            !isset($itemFromQuery['title']) ||
            !isset($itemFromQuery['genre']) ||
            !isset($itemFromQuery['original_language']) ||
            !isset($itemFromQuery['director']) ||
            !isset($itemFromQuery['producer']) ||
            !isset($itemFromQuery['writer']) ||
            !isset($itemFromQuery['release_date_theatres']) ||
            !isset($itemFromQuery['release_date_streaming']) ||
            !isset($itemFromQuery['runtime']) ||
            !isset($itemFromQuery['distributor'])
        ) {throw new InvalidArgumentException('Set the values');
        }
            if (!isset($itemFromQuery['img_location'])) {
                $itemFromQuery['img_location'] = 'images/dune.jpeg';
            }

            $genrename='';
            foreach($genres as $genre){

                if ($genre['id']==$itemFromQuery['genre']){
                    $genrename=$genre['genre1'];
                    break;
                }
            }

            $languagename='';
           foreach($languages as $language){

               if ($language['id']===$itemFromQuery['original_language']){
                   $languagename=$language['original_language1'];
                   break;
               }
           }

            $distributorname='';
            foreach($distributors as $distributor){

                if ($distributor['id']===$itemFromQuery['distributor']){
                    $distributorname=$distributor['distributor1'];
                    break;
                }
            }

            $result .=

                '<div class = "itemContainer">
                <h2>Title: ' . $itemFromQuery['title'] . '</h2> <br>
                <p>Director: ' . $itemFromQuery['director'] . '</p>
                <p>Producer: ' . $itemFromQuery['producer'] . '</p>
                <p>Writer: ' . $itemFromQuery['writer'] . '</p>
                <p>Genre: ' . $genrename . '</p>
                <p>Original Language: ' . $languagename . '</p>
                <p>Distributor: ' . $distributorname . '</p>
                <p>Release date (theatres): ' . $itemFromQuery['release_date_theatres'] . '</p>
                <p>Release date (streaming): ' . $itemFromQuery['release_date_streaming'] . '</p>
                <p>Runtime: ' . $itemFromQuery['runtime'] . '</p>
                <div class="itemImg">
                    <img src="' . $itemFromQuery['img_location'] . '" alt="film poster">
                </div>
            </div>';
        }
    return $result;
    }




function extract_genres_from_db(PDO $db): array {
    $query = $db->prepare('SELECT `id`,`genre1` FROM `filmgenre`;');
    $query->execute();
    return $query->fetchAll();
}

function extract_originalLanguage_from_db(PDO $db): array {
    $query = $db->prepare('SELECT `id`,`original_language1` FROM `filmlanguage`;');
    $query->execute();
    return $query->fetchAll();
}
function extract_distributor_from_db(PDO $db): array {
    $query = $db->prepare('SELECT `id`,`distributor1` FROM `filmdistributor`;');
    $query->execute();
    return $query->fetchAll();
}

function add_to_db(array $postArray,PDO $db) {
    $query = $db->prepare('INSERT INTO `films` (`title`, `genre`, `original_language`, `director`, `producer`, `writer`, `release_date_theatres`, `release_date_streaming`,`runtime` ,`distributor`) 
            VALUES (:title, :genre, :original_language, :director, :producer, :writer, :release_date_theatres, :release_date_streaming , :runtime, :distributor);');
    $query->execute($postArray);
}

