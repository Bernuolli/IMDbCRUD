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



<h1>Színészek felvétele</h1>

<form method="POST" action="insertactor.php" accept-charset="utf-8">
<table>
    <tr>
        <td>Színész neve: </td>
        <td><input type="text" name="name" required/></td>
    </tr>
    <tr>
        <td>Nemzetisége: </td>
        <td><input type="text" name="nationality" required/></td>
    </tr>
    <tr>
        <td>Születési éve: </td>
        <td><input type="text" name="birth" required/></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" value="Elküld" required/></td>
    </tr>
</table>
</form>


<hr/>
<h1>Színészek listája</h1>

<table class="content-table">
<thead>
    <tr>
        <th>ID</th>
        <th>Név</th>
        <th>Nemzetiség</th>
        <th>Születési év</th>
        <th></th>
        <th></th>
    </tr>
</thead>
<?php

	$szineszek = szineszlistatLeker();

    while( $egySor = mysqli_fetch_assoc($szineszek) ) {
		echo '<tr>';
		echo '<td>'. $egySor["id"] .'</td>';
		echo '<td>'. $egySor["name"] .'</td>';
		echo '<td>'. $egySor["nationality"] .'</td>';
		echo '<td>'. $egySor["birth"] .'</td>';
		echo '<td><form method="POST" action="edit-actorpage.php">
              <input type="hidden" name="name" value="'.$egySor["id"].'-'.$egySor["name"].'-'.$egySor["nationality"].'-'.$egySor["birth"].'" />
              <input type="submit" value="Módosítás" />
              </form></td>';
		echo '<td><form method="POST" action="deleteactor.php">
              <input type="hidden" name="id" value="'.$egySor["id"].'" />
              <input type="submit" value="Törlés" />
              </form></td>';
		echo '</tr>';
	}
	mysqli_free_result($szineszek);

?>
</table>


</BODY>
</HTML>