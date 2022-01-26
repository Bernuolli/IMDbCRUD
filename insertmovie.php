<?php

include_once("functions.php");

$v_title = $_POST['title'];
$v_release_date = $_POST['release_date'];
$v_genre = $_POST['genre'];
$v_hossz = $_POST['hossz'];
$v_rank = $_POST['rank'];
$v_directorID = $_POST['directorID'];
$v_studioID = $_POST['studioID'];


if ( isset($v_title) && isset($v_release_date) && isset($v_genre) && isset($v_hossz) && isset($v_rank) && isset($v_directorID) && isset($v_studioID)) {

	film_beszur($v_title, $v_release_date, $v_genre, $v_hossz, $v_rank, $v_directorID, $v_studioID);

	header("Location: movie.php");

} else {
	error_log("Nincs beállítva valamely érték");

}
?>