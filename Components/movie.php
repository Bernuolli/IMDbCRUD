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


<h1>Film felvétele</h1>

<form method="POST" action="insertmovie.php" accept-charset="utf-8">
<table>
<tr>
    <td>Film címe: </td>
    <td><input type="text" name="title" required/></td>
</tr>
<tr>
    <td>Megjelenési éve: </td>
    <td><input type="text" name="release_date" required/></td>
</tr>
<tr>
    <td>Műfaj: </td>
    <td><input type="text" name="genre" required/></td>
</tr>
<tr>
    <td>Hossz: </td>
    <td><input type="text" name="hossz" required/></td>
</tr>
<tr>
    <td>Értékelés: </td>
    <td><input type="text" name="rank" required/></td>
</tr>

</table>
<label>Rendező id: </label>
<select name="directorID">
<?php
    $rendezok = rendezoIDlistatLeker();
    while( $egySor = mysqli_fetch_assoc($rendezok) ) {
         echo '<option value="'.$egySor["id"].'">'.$egySor["id"].'</option>';
    }
    mysqli_free_result($rendezok);
?>
</select>
<br>
<label>Stúdió id: </label>
<select name="studioID">
<?php
    $studiok = studioIDlistatLeker();
    while( $egySor = mysqli_fetch_assoc($studiok) ) {
          echo '<option value="'.$egySor["name"].'">'.$egySor["name"].'</option>';
    }
    mysqli_free_result($studiok);
?>
</select>
<br>
<input type="submit" value="Elküld" />
</form>

<hr/>
<h1>Filmek listája</h1>
<table class="content-table">
    <thead>
    <tr>
        <th>Cím</th>
        <th>Megjelenési év</th>
        <th>Műfaj</th>
        <th>Hossz</th>
        <th>Értékelés</th>
        <th>Rendező</th>
        <th>Stúdió</th>
        <th>Színészek száma</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
<?php

    $filmek = filmlistatLeker();
    while( $egySor = mysqli_fetch_assoc($filmek) ) {
        echo '<tr>';
        echo '<td>'. $egySor["title"] .'</td>';
        echo '<td>'. $egySor["release_date"] .'</td>';
        echo '<td>'. $egySor["genre"] .'</td>';
        echo '<td>'. $egySor["hossz"] .'</td>';
        echo '<td>'. $egySor["rank"] .'</td>';
        echo '<td>'. $egySor["directorID"] .'</td>';
        echo '<td>'. $egySor["studioID"] .'</td>';
        echo '<td>'. szineszek_szama($egySor["title"]) .'</td>';
        echo '<td><form method="POST" action="edit-moviepage.php">
           <input type="hidden" name="name" value="'.$egySor["title"].'-'.$egySor["release_date"].'-'.$egySor["genre"].'-'.$egySor["hossz"].'-'.$egySor["rank"].'" />
           <input type="submit" value="Módosítás" />
           </form></td>';
        echo '<td><form method="POST" action="deletemovie.php">
              <input type="hidden" name="title" value="'.$egySor["title"].'" />
              <input type="submit" value="Film törlése" />
              </form></td>';
        echo '</tr>';
    }
    mysqli_free_result($filmek);
?>
</table>
</BODY>
</HTML>