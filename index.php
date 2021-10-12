<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <title>Index</title>
</head>
<body>
    <div class="asd">

   <p> VÄLKOMMEN TILL EVENTHANTERAREN!!!! </p>
</div>
<div class="lasse">
    Inloggad som: Lasse
</div>
    </form>
    <div class="color">
    <div>
    <header class="top"></header>
    </div>
    
    <!--<div id="mySidenav" class="sidenav">
        
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        
        <a href="#" class="dropdown-btn">Redigera <i class="fa fa-angle-down"></i></a>    
            <div class="dropdown-container">
                <a href="#">Användare</a>
                <a href="#">Event</a>
            </div>

        <a href="#">Lägg till</a>
        <a href="#">Ta bort</a>
        <a href="#">Kalender</a>
        
        <div class="dark-mode" onclick="myFunction()">
            <p class="mörk">Dark mode</p>
        </div>
    </div>
    <span class="opennav" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
</div>-->

<div class="form">
<form action="process.php" method="POST">
    
    <input type="text" name="namn" placeholder="Namn på event" require autocomplete="off">

    <label for="starttid">Starttid:</label>
    <input type="datetime-local" name="starttid" require>
    <label for="sluttid">Sluttid:</label>
    <input type="datetime-local" name="sluttid" require>
    <input type="submit" name="submit" value="submit">
</div>
    <?php
include 'conn.php';
$sql = "SELECT starttid, sluttid, eventid, agare, namn FROM event, anvandare ";
$result = mysqli_query($conn, $sql);
?>
<div class="print">
Kommande event
<br>
<?php
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo " <br> Namn: " . $row["namn"]. "<br> Ägare: " . $row["agare"]. "<br> Start: " . $row["starttid"]. "<br> Slut: " . $row["sluttid"]. "<br>";
  }
} else {
  echo "0 results";
}
?>
</div>
<?php
mysqli_close($conn);
?>
</body>
<script src="theprovider.js"></script>
</html>

