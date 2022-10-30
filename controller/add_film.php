<?php

//gaining acces to database
include_once "./db/db.php";

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['add-film-button']) &&
    $_FILES &&
    $_FILES["cover"]["error"] == UPLOAD_ERR_OK
) {
    $title = str_replace('\'', "`", $_POST['title']);
    $release_date = $_POST['release-date'];
    $duration = str_replace('\'', "`", $_POST['duration']);
    $tagline = str_replace('\'', "`", $_POST['tagline']);
    $director = str_replace('\'', "`", $_POST['director']);
    $age_rating = str_replace('\'', "`", $_POST['age-rating']);
    $description = str_replace('\'', "`", $_POST['description']);
    $trailer = str_replace('\'', "`", $_POST['trailer']);
    if (count($_POST['genres']) > 5) {
        echo '<script>alert("Film may have up to 5 genres")</script>';
    } else {
        $path = "img/" . $_FILES["cover"]["name"];
        move_uploaded_file($_FILES["cover"]["tmp_name"], $path);
        $params_to_insert = array(
            "title"         => $title,
            "release_date"  => $release_date,
            "tagline"       => $tagline,
            "director"      => $director,
            "age_rating"    => $age_rating, 
            "cover"         => $path,
            "description"   => $description, "trailer" => $trailer, 
            "duration"      => $duration);

        include_once './model/Film.php';
        $film = new classInstance\Film($title, $release_date, $tagline, 
            $director, $age_rating, $path, $description, $trailer, $duration);
        $film_id = $film->film_id;
        // add to DB
        //$table = "Film";
        //$film_id = insert($table, $params_to_insert); // add new film
        

        $table = "Film_Genre";
        if (isset($_POST['genres'])) // add film's genres
        {
            if(!empty($_POST['genres']))
            {
                foreach($_POST['genres'] as $genre)
                {
                    $params_to_insert = array("film_id" => $film_id, "genre_name" => $genre);
                    insert($table, $params_to_insert);     
                }
            }
        }
        echo '<script>alert("Film successfully added")</script>';
    }
}