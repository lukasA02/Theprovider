<?php

require_once "conn.php";
require_once "behorighet.php";

echo $anvandarid;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="redigeraanvandare.php" method="GET">
    <input type="hidden" name="anvandarid" value="<?php echo $anvandarid; ?>">
    <input type="text" placeholder="Anvandarnamn" name="Anvnamn">
    <input type="text" placeholder="Efternamn" name="Enamn">
    <input type="text" placeholder="Fornamn" name="Fnamn">
    <input type="text" placeholder="Epost" name="Epost">
    <input type="text" placeholder="Telefon" name="Telefon">
    <input type="submit" value="submit">
</form>
</body>
</html>


