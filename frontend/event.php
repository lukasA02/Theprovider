<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="GET">
        <input type="text" name="evid" placeholder="EventID" required>
        <input type="text" name="namn" placeholder="Nytt namn på event">
        <label for="starttid">Ny starttid</label>
        <input type="datetime-local" name="starttid">
        <label for="sluttid">Ny sluttid</label>
        <input type="datetime-local" name="sluttid">
        <label for="delete">Ta bort event?</label>
        <button type="submit" name="tabort" >tabort</button>
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php

require_once '../conn.php';

if(isset($_GET['tabort'])){
    $evid = $_GET['evid'];
    $sql = "DELETE FROM event WHERE EventID= $evid";
    
    if (mysqli_query($conn, $sql)) {
        echo " Event uppdaterat";
      } else {
        echo " Fel: " . $sql . "<br>" . mysqli_error($conn);
      }
    mysqli_close($conn);
    }

if(isset($_GET['submit'])){
    $evid = $_GET['evid'];
    $namn = $_GET['namn'];
    $sttid = $_GET['starttid'];
    $sltid = $_GET['sluttid'];
    

    if(isset($_GET['namn']) && isset($_GET['starttid']) && isset($_GET['sluttid'])){ 
        $sql = "UPDATE event SET Namn = '$namn', Starttid ='$sttid', Sluttid='$sltid' WHERE EventID = $evid";
    }

if (mysqli_query($conn, $sql)) {
    echo " Event uppdaterat";
  } else {
    echo " Fel: " . $sql . "<br>" . mysqli_error($conn);
  }
mysqli_close($conn);
}
?>