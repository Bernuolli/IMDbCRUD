<?php

include_once('functions.php');

$title = $_POST["title"];

if ( isset($title)) {

    $sikeres = filmtorlese($title);

    if ( $sikeres ) {
        header('Location: movie.php');
    } else {
        echo 'Hiba történt a film törlése során';
    }

} else {
    echo 'Hiba történt a film törlése során';

}

?>