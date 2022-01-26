<?php
include_once('menu.php');
list($title, $release_date, $genre, $hossz, $rank) = explode("-", $_POST['name'], 5);
?>
<html>
<head>
<link rel="stylesheet" href="stilus.css">
</head>
<body>
<h1>Film módosítása</h1>
<form method="POST" action="edit-movie.php" accept-charset="utf-8">
    <table>
        <tr>
            <td>Film címe: </td>
            <td><input type="text" name="title" value="<?php echo $title; ?>"  readonly/></td>
        </tr>
        <tr>
            <td>Megjelenési éve: </td>
            <td><input type="text" name="release_date" value="<?php echo $release_date; ?>"/></td>
        </tr>
        <tr>
            <td>Műfaja: </td>
            <td><input type="text" name="genre" value="<?php echo $genre; ?>"/></td>
        </tr>
         <tr>
            <td>Hossza: </td>
            <td><input type="text" name="hossz" value="<?php echo $hossz; ?>"/></td>
        </tr>
        <tr>
            <td>Értékelése: </td>
            <td><input type="text" name="rank" value="<?php echo $rank; ?>"/></td>
        </tr>
        <td><input type="submit" value="Elküld" /></td>
    </tr>
    </table>


</form>
</body>
</html>