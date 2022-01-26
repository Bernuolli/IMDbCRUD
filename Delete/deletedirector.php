<?php

include_once('functions.php');

$id = $_POST["id"];

if ( isset($id)) {

    $sikeres = rendezotorlese($id);

    if ( $sikeres ) {
        header('Location: director.php');
    } else {
        echo 'Hiba történt a rendező törlése során';
    }

} else {
    echo 'Hiba történt a rendező törlése során';

}

?>