<?php

include_once("functions.php");

$v_id = $_POST['id'];
$v_name = $_POST['name'];
$v_nationality = $_POST['nationality'];
$v_birth = $_POST['birth'];


if ( isset($v_name) && isset($v_nationality) && isset($v_birth)) {

	szinesz_beszur($v_name, $v_nationality, $v_birth);

	header("Location: actor.php");

} else {
	error_log("Nincs beállítva valamely érték");

}
?>
