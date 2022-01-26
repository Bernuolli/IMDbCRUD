<?php

include_once('functions.php');

$title = $_POST["title"];
$release_date = $_POST["release_date"];
$genre = $_POST["genre"];
$hossz = $_POST["hossz"];
$rank = $_POST["rank"];



if ( isset($title) && isset($release_date) && isset($genre) && isset($hossz) && isset($rank)) {

    $sikeres = film_modositas($title,$release_date,$genre,$hossz,$rank);

    if ( $sikeres ) {
        header('Location: movie.php');
    } else {
        echo 'Hiba történt a színész módosítása során';
    }

} else {
    echo 'Hiba történt a színész módosítása során';

}

?>