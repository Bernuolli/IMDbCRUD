<?php

include_once('functions.php');

$id = $_POST["id"];


if ( isset($id)) {

    $sikeres = szinesztorlese($id);

    if ( $sikeres ) {
        header('Location: actor.php');
    } else {
        echo 'Hiba történt a színész törlése során';
    }

} else {
    echo 'Hiba történt a színész törlése során';

}

?>