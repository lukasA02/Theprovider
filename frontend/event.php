<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style-gen.css">
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
      <div class="form">
        <form action="" method="GET">
            <input type="text" name="aid" placeholder="Användarid" required>
            <input type="text" name="hash" placeholder="Hashnyckel" required>
            <input type="text" name="evid" placeholder="EventID" required>
            <input type="text" name="namn" placeholder="Nytt namn på event">
            <label for="starttid">Ny starttid</label>
            <input type="datetime-local" name="starttid">
            <label for="sluttid">Ny sluttid</label>
            <input type="datetime-local" name="sluttid">
            <label for="delete">Ta bort event?
            <button type="submit" name="tabort" >tabort</button>
            <input type="submit" name="submit">
        </form>
        </div>
    </body>
    </html>
<?php
require_once '../conn.php';
require_once '../verifiera.php';

if(isset($_GET['hash'], $_GET['aid'])) {
  if(verifiera($_GET['hash'], $_GET['aid'])) {
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
  }
}
?>