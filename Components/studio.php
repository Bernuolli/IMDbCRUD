<?php
include_once('functions.php');
include_once('menu.php');
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <link rel="stylesheet" href="stilus.css">
	<meta http-equiv="content-type" content="text/html; charset=UTF8" >
	<script type="text/javascript">
            window.onload = function() {

            var options = {
            	exportEnabled: true,
            	animationEnabled: true,
            	title:{
            		text: "Stúdiók filmszám szerinti elosztása"
            	},
            	legend:{
            		horizontalAlign: "right",
            		verticalAlign: "center"
            	},
            	data: [{
            		type: "pie",
            		showInLegend: true,
            		toolTipContent: "<b>{name}</b>: {y}db (#percent%)",
            		indexLabel: "{name}",
            		legendText: "{name} (#percent%)",
            		indexLabelPlacement: "inside",
            		dataPoints: [
            		<?php
            			diagram_feltoltes();
            			?>
            		]
            	}]
            };
            $("#chartContainer").CanvasJSChart(options);

            }
            </script>
</HEAD>
<BODY>


<h1>Filmstúdió felvétele</h1>

<form method="POST" enctype="multipart/form-data" action="insertstudio.php" accept-charset="utf-8">
<table>
<tr>
<td>Stúdió neve: </td>
<td><input type="text" name="name" required/></td>
</tr>
<tr>
<td>Városa: </td>
<td><input type="text" name="city" required/></td>
</tr>
<tr>
<td>Kép kiválasztása</td>
<td><input type="file" name="picupload" required></td></tr>
</tr>
<td></td>
<td><input type="submit" name="submit" value="Elküld" /></td>
</tr>
</table>
</form>


<hr/>
<h1>Filmstúdiók listája</h1>

<table class="content-table">
    <tr>
    <thead>
        <th>Név</th>
        <th>Város</th>
        <th>FilmDB</th>
        <th>Képek</th>
        <th></th>
        <th></th>
        </tr>
    </thead>
    <tbody>
    <?php

	$studiok = studiolistatLeker();

    while( $egySor = mysqli_fetch_assoc($studiok) ) {
		echo '<tr>';
		echo '<td>'. $egySor["name"] .'</td>';
		echo '<td>'. $egySor["city"] .'</td>';
		echo '<td>'. filmek_szama( $egySor["name"]) .'</td>';
        echo '<td>'. "<img src='images/".$egySor['pics']."' style='width:40px;' >".'</td>';
		echo '<td><form method="POST" action="edit-studiopage.php">
                      <input type="hidden" name="name" value="'.$egySor["name"].'-'.$egySor["city"].'-'.$egySor["pics"].'" />
                      <input type="submit" value="Módosítás" />
                      </form></td>';
        echo '<td><form method="POST" action="deletestudio.php">
              <input type="hidden" name="name" value="'.$egySor["name"].'" />
              <input type="submit" value="Törlés" />
              </form></td>';
		echo '</tr>';
	}
	mysqli_free_result($studiok);

?>
</tbody>
</table>
<h2>Top 3 legtöbb filmmel rendelkező stúdió</h2>
<table class="content-table">
    <tr>
    <thead>
    <th>Név</th>
    </thead>

    <?php
        $legtobb = studio_top3();
        while( $egySor = mysqli_fetch_assoc($legtobb) ) {
                echo '<tr>';
                echo '<td>'. $egySor["name"] .'</td>';
                echo '</tr>';
            }
            mysqli_free_result($legtobb);

    ?>
</table>
<hr/>
<table>
<td><div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script></td>
</table>

</BODY>
</HTML>