<?php
include_once('menu.php');
list($id, $name, $birth) = explode("-", $_POST['name'], 3);
?>
<html>
<head>
<link rel="stylesheet" href="stilus.css">
</head>
<body>
<h1>Rendező módosítása</h1>
<form method="POST" action="edit-director.php" accept-charset="utf-8">
    <table>
        <tr>
            <td>Rendező id: </td>
            <td><input type="text" name="id" value="<?php echo $id; ?>"  readonly/></td>
        </tr>
        <tr>
            <td>Rendező neve: </td>
            <td><input type="text" name="name" value="<?php echo $name; ?>"/></td>
        </tr>
         <tr>
         <td>Rendező születési éve: </td>
            <td><input type="text" name="birth" value="<?php echo $birth; ?>"/></td>
        </tr>
        <td><input type="submit" value="Elküld" /></td>
        </tr>

    </table>
</form>
</body>
</html>