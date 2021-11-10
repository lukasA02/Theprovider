<?php
require_once '../behorighet.php';
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
<form action="../vissablogg.php" method="GET">

    <input type="number" name="BloggID" placeholder="Blogg ID">
    <input type="text" name="aid" placeholder="AnvändarID">
    <input type="text" name="hash" placeholder="hash key">
    <input type="submit" value="submit">
</form>
    
</body>
</html>