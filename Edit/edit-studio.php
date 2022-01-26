<?php

include_once('functions.php');


$name = $_POST["name"];
$city = $_POST["city"];

if (isset($_FILES["picupload"])) {
    $engedelyezett_kiterjesztesek = ["jpg", "jpeg", "png"];

    $kiterjesztes = strtolower(pathinfo($_FILES["picupload"]["name"], PATHINFO_EXTENSION));

    if (in_array($kiterjesztes, $engedelyezett_kiterjesztesek)) {
      if ($_FILES["picupload"]["error"] === 0) {
        if ($_FILES["picupload"]["size"] <= 31457280) {
          $cel = "images/" . $_FILES["picupload"]["name"];

          if (file_exists($cel)) {
            echo "<strong>Figyelem:</strong> A régebbi fájl felülírásra kerül! <br/>";
          }

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

if ( isset($name) && isset($city)) {

    $sikeres = studio_modositas($name,$city,$_FILES["picupload"]["name"]);

    if ( $sikeres ) {
        header('Location: studio.php');
    } else {
        echo 'Hiba történt a stúdió módosítása során';
    }

} else {
    echo 'Hiba történt a stúdió módosítása során';

}

?>