<?php
include_once('menu.php');
list($id, $name, $nationality, $birth) = explode("-", $_POST['name'], 4);
?>
<html>
<head>
<link rel="stylesheet" href="stilus.css">
</head>
<body>
<h1>Színész módosítása</h1>
<form method="POST" action="edit-actor.php" accept-charset="utf-8">
    <table>
        <tr>
            <td>Színész id: </td>
            <td><input type="text" name="id" value="<?php echo $id; ?>"  readonly/></td>
        </tr>
        <tr>
            <td>Színész neve: </td>
            <td><input type="text" name="name" value="<?php echo $name; ?>"/></td>
        </tr>
        <tr>
            <td>Színész nemzetisége: </td>
            <td><input type="text" name="nationality" value="<?php echo $nationality; ?>"/></td>
        </tr>
         <tr>
         <td>Színész születési éve: </td>
            <td><input type="text" name="birth" value="<?php echo $birth; ?>"/></td>
        </tr>


        <td><input type="submit" value="Elküld" /></td>
        </tr>

    </table>
</form>
</body>
</html>