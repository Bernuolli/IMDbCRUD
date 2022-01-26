<?php

include_once('functions.php');

$name = $_POST["name"];

if ( isset($name)) {

    $sikeres = studiotorlese($name);

    if ( $sikeres ) {
        header('Location: studio.php');
    } else {
        echo 'Hiba történt a stúdió törlése során';
    }

} else {
    echo 'Hiba történt a stúdió törlése során';

}

?>