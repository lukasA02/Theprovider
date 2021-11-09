<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foretag</title>
</head>
<body>
    <form action="" method="GET">
        <label for="fil">Lägg in företagets logga. </label>
        <br>
<input type="file" name="fil" accept="image/png, image/jpeg">
<br>
<br>
<label for="farg">Välj färg för företagets kalender. </label>
<br>
<input type="text" name="farg" placeholder="Hex format: #ffffff" value="#ffffff">
<br>
<br>
<label for="font">Välj ett typsnitt. </label>
<br>
<select name="font" id="font">
  <option value="Arial">Arial</option>
  <option value="Georgia">Georgia</option>
  <option value="Courier New">Courier New</option>
  <option value="Comic Sans MS">Comic Sans MS</option>
</select>
<br>
<br>
<label for="fontsize">Välj storlek på typsnittet</label>
<br>
<br>
<select name="fontsize" id="fontsize">
  <option value="14px">14px</option>
  <option value="16px">16px</option>
  <option value="18px">18px</option>
  <option value="22px">22px</option>
  <option value="24px">24px</option>
  <option value="26px">26px</option>
</select>
<br>
<br>
<label for="bakgrund">Lägg in en bakgrundsbild (valfritt). </label>
<br>
<input type="file" name="bak" accept="image/png, image/jpeg" >
<br>
<input type="submit" name="submit">
    
    </form>
</body>


<?php

include '../conn.php';

if (isset($_GET['submit'])){

    $dinstil  = "echo '<style> 
    body {background-color: " . ($_GET['farg']) . "; font-family:" . ($_GET['font']) . ";font-size:" . ($_GET['fontsize']) . ";}
    </style>'";

    $escapedDinstil = mysqli_real_escape_string($conn,$dinstil);

    $fil    =   ($_GET['fil']);
    $bak    =   ($_GET['bak']);


$sql =" INSERT INTO foretag (fil, bak, css) VALUES ('$fil', '$bak', '$escapedDinstil')";

if (mysqli_query($conn, $sql)) {
    echo "Konto skapat";
  } else {
    echo "Fel: " . $sql . "<br>" . mysqli_error($conn);
  }



$sql = "SELECT * FROM foretag";
    $result = mysqli_query($conn,$sql);
    if (mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_array($result)) {
     //  echo "Success!" . " <br> Logga: " . "<img src='$row[fil]' width='100' height='100'>" . "<br> Färg: " . 
     //  $row["farg"] . "<br> bakgrundsbild: " . 
       // "<img src='$row[bak]' width='100' height='100'>" . "<br>";
        $dat = array("logga"=>$row["fil"], "bak"=>$row["bak"], "css"=>$row["css"] );
     echo json_encode($dat);
    }}

    else{
        echo "Failed";}
    
    }
?>
</html>