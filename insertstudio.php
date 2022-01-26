<?php

include_once("functions.php");

$v_name = $_POST['name'];
$v_city = $_POST['city'];


if (isset($_FILES["picupload"])) {
    //kiterjesztés megadása
    $engedelyezett_kiterjesztesek = ["jpg", "jpeg", "png"];

    //fájl kiterjesztésének lekérdezése
    $kiterjesztes = strtolower(pathinfo($_FILES["picupload"]["name"], PATHINFO_EXTENSION));

    //kiterjesztése szerepel az engedélyezettek között...
    if (in_array($kiterjesztes, $engedelyezett_kiterjesztesek)) {
      //ha a fájl feltöltése sikeres
      if ($_FILES["picupload"]["error"] === 0) {
        //ha a fájlméret nem nagyobb 30 MB-nál
        if ($_FILES["picupload"]["size"] <= 31457280) {
          //cél útvonal összeállítáa
          $cel = "images/" . $_FILES["picupload"]["name"];

          //ha már létezik ilyen nevű fájl az útvonalon, figyelmeztet
          if (file_exists($cel)) {
            echo "<strong>Figyelem:</strong> A régebbi fájl felülírásra kerül! <br/>";
          }

          //a fájl átmozgatása az útvonalra
          if (move_uploaded_file($_FILES["picupload"]["tmp_name"], $cel)) {
            echo "Sikeres fájlfeltöltés! <br/>";
          } else {
            echo "<strong>Hiba:</strong> A fájl átmozgatása nem sikerült! <br/>";
          }
        } else {
          echo "<strong>Hiba:</strong> A fájl mérete túl nagy! <br/>";
        }
      } else {
        echo "<strong>Hiba:</strong> A fájlfeltöltés nem sikerült! <br/>";
      }
    } else {
      echo "<strong>Hiba:</strong> A fájl kiterjesztése nem megfelelő! <br/>";
    }
  }

if ( isset($v_name) && isset($v_city)) {
    studio_beszur($v_name, $v_city,  $_FILES["picupload"]["name"]);
    header("Location: studio.php");
} else {
	error_log("Nincs beállítva valamely érték");
}
?>