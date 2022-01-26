<?php

include_once('functions.php');

$id = $_POST["id"];
$name = $_POST["name"];
$nationality = $_POST["nationality"];
$birth = $_POST["birth"];



if ( isset($id) && isset($name) && isset($nationality) && isset($birth)) {

    $sikeres = szinesz_modositas($id,$name,$nationality,$birth);

    if ( $sikeres ) {
        header('Location: actor.php');
    } else {
        echo 'Hiba történt a színész módosítása során';
    }

} else {
    echo 'Hiba történt a színész módosítása során';

}

?>