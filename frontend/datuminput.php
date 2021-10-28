<?php
require_once '../behorighet.php';
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Datum</title>
</head>
<body>
    <form action="../inputdatum.php" method="GET">
        <input type="date" name="date">
        <input type="submit" name="submit">
        <input type="text" name="anv" placeholder="AnvändarID">
       <input type="text" name="hash"placeholder="hash key"> 
    </form>
</body>
</html>