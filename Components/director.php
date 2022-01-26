<?php
include_once('functions.php');
include_once('menu.php');
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<meta http-equiv="content-type" content="text/html; charset=UTF8" >
	<link rel="stylesheet" href="stilus.css">
</HEAD>
<BODY>



<h1>Rendező felvétele</h1>

<form method="POST" action="insertdirector.php" accept-charset="utf-8">
<table>
    <tr>
        <td>Rendező neve: </td>
        <td><input type="text" name="name" required/></td>
    </tr>
    <tr>
        <td>Születési éve: </td>
        <td><input type="text" name="birth" required/></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" value="Elküld" /></td>
    </tr>
</table>
</form>


<hr/>
<h1>Rendezők listája</h1>

<table class="content-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Születési év</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
<?php

	$rendezok = rendezolistatLeker();

    while( $egySor = mysqli_fetch_assoc($rendezok) ) {
		echo '<tr>';
		echo '<td>'. $egySor["id"] .'</td>';
		echo '<td>'. $egySor["name"] .'</td>';
		echo '<td>'. $egySor["birth"] .'</td>';
		echo '<td><form method="POST" action="edit-directorpage.php">
              <input type="hidden" name="name" value="'.$egySor["id"].'-'.$egySor["name"].'-'.$egySor["birth"].'" />
              <input type="submit" value="Módosítás" />
              </form></td>';
		echo '<td><form method="POST" action="deletedirector.php">
              <input type="hidden" name="id" value="'.$egySor["id"].'" />
              <input type="submit" value="Törlés" />
              </form></td>';
        echo '</tr>';
	}
	mysqli_free_result($rendezok);

?>
</table>


</BODY>
</HTML>
