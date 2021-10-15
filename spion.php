<?php

    $SpionID = $_GET['SpionID'];

?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <title>spionen</title>
</head>
<body>
    <div class="asd">

   <p> spionering!!!! </p>
</div>
    </form>
    <div class="color">
    <div>
    <header class="top"></header>
    </div>

    <br>

<?php
    include 'conn.php';
    $sql = "SELECT starttid, sluttid, eventid, agare, namn FROM event WHERE agare='$SpionID'";
    $result = mysqli_query($conn, $sql);
?>
<div class="print">
Kommande event
<br>
<?php
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<br> Ägare: " . $row["agare"]. "<br> Start: " . $row["starttid"]. "<br> Slut: " . $row["sluttid"]. "<br>";
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

