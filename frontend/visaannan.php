<?php
require_once '../behorighet.php';
?>


<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <title>Visa när andra är upptagna</title>
</head>
<body>
    <div class="asd">

   <p> Ange ett ID </p>
</div>
    
    
<form action="visarn.php" method="GET">
    <input type="number" name="VisarID">
    <input type="text" name="anv" placeholder="AnvändarID">
    <input type="text" name="hash"placeholder="hash key">
    <input type="submit" value="submit">
    
</form>
</body>

</html>

