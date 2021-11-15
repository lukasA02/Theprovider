<?php
require_once '../behorighet.php';
?>


<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-gen.css">
    <title>Visa när andra är upptagna</title>
</head>
<body>
<iframe src="ram.php" style="
            position: fixed;
            top: 0px;
            bottom: 0px;
            right: 0px;
            width: 230px;
            border: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            z-index: 999999;
            height: 100px;
        "></iframe>
    <div class="asd">

   <p> Ange ett ID </p>
</div>

<div class="form">
<form action="visarn.php" method="GET">
    <input type="number" name="VisarID">
    <input type="text" name="aid" placeholder="AnvändarID">
    <input type="text" name="hash"placeholder="hash key">
    <input type="submit" value="submit">
</form>
</div>

</body>

</html>

