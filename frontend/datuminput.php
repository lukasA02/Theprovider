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
    <link rel="stylesheet" href="style-gen.css">
</head>
<body>
    <div class="form">
    <form action="../inputdatum.php" method="GET">
        <input type="date" name="date">
        <input type="text" name="anv" placeholder="AnvändarID">
       <input type="text" name="hash"placeholder="hash key"> 
       <input type="submit" name="submit">
    </form>
    </div>
</body>
</html>