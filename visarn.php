<?php

    $VisarID = $_GET['VisarID'];

?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events!</title>
</head>
<body>
<?php
    include 'conn.php';
    $sql = "SELECT Starttid, Sluttid, eventid, agare, namn FROM event WHERE agare='$VisarID'";
    $result = mysqli_query($conn, $sql);
?>
<?php
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            //echo "<br> Ägare: " . $row["agare"]. "<br> Start: " . $row["starttid"]. "<br> Slut: " . $row["sluttid"]. "<br>";
            $visa = array("Ägare"=>$row["agare"], "Start"=>$row["Starttid"], "Slut"=>$row["Sluttid"] );
     echo json_encode($visa);
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
</html>

