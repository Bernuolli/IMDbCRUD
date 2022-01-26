<?php
include_once('menu.php');
$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");
mysqli_query($conn, 'SET NAMES UTF-8');
mysqli_query($conn, "SET character_set_results=utf8");
mysqli_set_charset($conn, 'utf8');


mysqli_query($conn, "DROP DATABASE imdb");

mysqli_close($conn);
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="stilus.css">
</head>
<body>

<h1>Sikeresen törölted az adatbázisod!</h1>
<form action="index.php">
    <input type="submit" value="vissza">
</form>
</body>
</html>