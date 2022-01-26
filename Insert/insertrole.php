<?php

include_once("functions.php");


$v_actorID = $_POST['actorID'];
$v_movieID = $_POST['movieID'];


if ( isset($v_actorID) && isset($v_movieID)) {

	szerep_beszur($v_actorID, $v_movieID);

	header("Location: role.php");

} else {
	error_log("Nincs beállítva valamely érték");

}
?>