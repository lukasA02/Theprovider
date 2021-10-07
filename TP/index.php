<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <form action="kalender.php" method="POST">
    
    <input type="text" name="namn" placeholder="Namn på event" require>
    <input type="text" name="agare" placeholder="Ägare" require>
    <label for="starttid">Starttid:</label>
    <input type="datetime-local" name="starttid" require>
    <label for="sluttid">Sluttid:</label>
    <input type="datetime-local" name="sluttid" require>
    <input type="submit" name="submit" value="submit">

    </form>
</body>
</html>

<?php
include 'conn.php';
$sql = "SELECT starttid, sluttid, eventid, agare, namn FROM event";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<br> id: " . $row["eventid"]. " <br> Namn: " . $row["namn"]. "<br> Ägare: " . $row["agare"]. "<br> Start: " . $row["starttid"]. "<br> Slut: " . $row["sluttid"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>