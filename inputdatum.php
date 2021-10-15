<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Datum</title>
</head>
<body>
    <form action="" method="GET">
        <input type="date" name="date">
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php
include 'conn.php';

if (isset($_GET['submit'])){
    $date = $_GET['date'];

    $sql = "SELECT * FROM event WHERE Starttid BETWEEN '$date 00:00:00' AND '$date 23:59:00'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_array($result)) {
        echo "Success!" . " <br> Namn: " . $row["Namn"] . "<br> Start: " . $row["Starttid"]. "<br> Slut: " . $row["Sluttid"]. "<br>";
      } 
     
    mysqli_close($conn);
    
    }
}


?>