<?php

include_once('functions.php');

$actorID = $_POST["actorID"];
$movieID = $_POST["movieID"];

if ( isset($actorID) && isset($movieID) ) {

    $sikeres = szereptorlese($actorID,$movieID);

    if ( $sikeres ) {
        header('Location: role.php');
    } else {
        echo 'Hiba történt a szerep törlése során';
    }

} else {
    echo 'Hiba történt a szerep törlése során';

}

?>