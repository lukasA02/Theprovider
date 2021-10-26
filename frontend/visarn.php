<?php
    include '../conn.php';

    if(isset($_GET['VisarID'])) {
        $VisarID = $_GET['VisarID'];
        $sql = "SELECT Starttid, Sluttid, eventid, agare, namn FROM event WHERE agare='$VisarID'";
        $result = mysqli_query($conn, $sql);

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
            mysqli_close($conn);

    }
    else {
        echo "Fyll i alla fält";
        header("Refresh: 2; visaannan.php");
    }
?>