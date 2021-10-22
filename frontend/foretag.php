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

    $fil    =   ($_GET['fil']);
    $farg   =   ($_GET['farg']);
    $bak    =   ($_GET['bak']);
}

$sql =" INSERT INTO foretag (fil, farg, bak) VALUES ('$fil', '$farg', '$bak')";

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
        $dat = array("logga"=>$row["fil"], "farg"=>$row["farg"], "bak"=>$row["bak"] );
     echo json_encode($dat);
    }}

    else{
        echo "Failed";}
    

?>
</html>