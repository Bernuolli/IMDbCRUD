<?php
include_once('menu.php');
$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");
mysqli_query($conn, 'SET NAMES UTF-8');
mysqli_query($conn, "SET character_set_results=utf8");
mysqli_set_charset($conn, 'utf8');

mysqli_query($conn, "CREATE DATABASE imdb");

$database = mysqli_select_db($conn, "imdb");

$my_file = fopen("table.sql", "r") or die("Unable to open file!");
while (!feof($my_file)) {
    $sql = str_replace(";", "", fgets($my_file));
    mysqli_query($conn, $sql);
}
fclose($my_file);

$my_file = fopen("insert.sql", "r") or die("Unable to open file!");
while (!feof($my_file)) {
    $sql = str_replace(";", "", fgets($my_file));
    mysqli_query($conn, $sql);
}
fclose($my_file);

mysqli_close($conn);
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="stilus.css">
</head>
<body>

<h1>Az adatbázis sikeresen létrejött!</h1>

<form action="index.php">
    <input type="submit" value="vissza">
</form>
</body>
</html>
