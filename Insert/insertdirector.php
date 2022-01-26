<?php

include_once("functions.php");

$v_id = $_POST['id'];
$v_name = $_POST['name'];
$v_birth = $_POST['birth'];

if ( isset($v_name) && isset($v_birth)) {

	rendezo_beszur($v_name, $v_birth);

	header("Location: director.php");
} else {
	error_log("Nincs beállítva valamely érték");

}
?>
