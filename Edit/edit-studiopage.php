<?php
include_once('menu.php');
list($name, $city, $pics) = explode("-", $_POST['name'], 3);
?>
<html>
<head>
<link rel="stylesheet" href="stilus.css">
</head>
<body>
<h1>Stúdió módosítása</h1>
<form method="POST" enctype="multipart/form-data" action="edit-studio.php" accept-charset="utf-8">
    <table>
        <tr>
            <td>Stúdió neve: </td>
            <td><input type="text" name="name" value="<?php echo $name; ?>" readonly/></td>
        </tr>
        <tr>
            <td>Városa: </td>
            <td><input type="text" name="city" value="<?php echo $city; ?>"/></td>
        </tr>
        <tr>
        <td>Kép kiválasztása</td>
        <td><input type="file" name="picupload" ></td></tr>
        </tr>

        <td><input type="submit" value="Elküld" /></td>
        </tr>

    </table>
</form>
</body>
</html>