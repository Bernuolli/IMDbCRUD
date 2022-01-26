<?php
    include_once('functions.php');
    include_once('menu.php');
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <link rel="stylesheet" href="stilus.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
</HEAD>
<BODY>



<h1>Szerep felvétele</h1>

<form method="POST" action="insertrole.php" accept-charset="utf-8">

<label>Színész id: </label>
<select name="actorID">
<?php
    $szineszek = szineszIDlistatLeker();
    while( $egySor = mysqli_fetch_assoc($szineszek) ) {
         echo '<option value="'.$egySor["id"].'">'.$egySor["id"].'</option>';
    }
    mysqli_free_result($szineszek);
?>
</select>
<br>
<label>Film cím: </label>
<select name="movieID">
<?php
    $filmek = filmIDlistatLeker();
    while( $egySor = mysqli_fetch_assoc($filmek) ) {
          echo '<option value="'.$egySor["title"].'">'.$egySor["title"].'</option>';
    }
    mysqli_free_result($filmek);
?>
</select>
<br>
<input type="submit" value="Elküld" />
</form>

<hr/>
<h1>Szerepek listája</h1>
<table class="content-table">
    <thead>
    <tr>
    <th>Színész id</th>
    <th>Film cím</th>
    <th></th>
    </tr>
    </thead>
<?php

    $filmek = szereplistatLeker();
    while( $egySor = mysqli_fetch_assoc($filmek) ) {
        echo '<tr>';
        echo '<td>'. $egySor["actorID"] .'</td>';
        echo '<td>'. $egySor["movieID"] .'</td>';
        echo '<td><form method="POST" action="deleterole.php">
              <input type="hidden" name="actorID" value="'.$egySor["actorID"].'" />
              <input type="hidden" name="movieID" value="'.$egySor["movieID"].'" />
              <input type="submit" value="Szerep törlése" />
              </form></td>';
        echo '</tr>';
    }
    mysqli_free_result($filmek);
?>
</table>

</BODY>
</HTML>