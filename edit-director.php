<?php

include_once('functions.php');

$id = $_POST["id"];
$name = $_POST["name"];
$birth = $_POST["birth"];



if ( isset($id) && isset($name) && isset($birth)) {

    $sikeres = rendezo_modositas($id,$name,$birth);

    if ( $sikeres ) {
        header('Location: director.php');
    } else {
        echo 'Hiba történt a rendező módosítása során';
    }

} else {
    echo 'Hiba történt a rendező módosítása során';

}

?>