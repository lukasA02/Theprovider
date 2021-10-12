<?php
//input för event
include 'conn.php';
if(isset ($_POST['submit']))
{
    $namn = $_POST['namn'];
    $agare = 1;
    $start = $_POST['starttid'];
    $slut = $_POST['sluttid'];

    $sql = "SELECT * FROM event WHERE (Starttid >= ? AND Sluttid <= ? AND Agare = ?);";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $start, $slut, $agare);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $num_rows = $result->num_rows;
    }

    if ($num_rows > 0) {
        echo "Redan bokat";
    } else {
        $sql="INSERT INTO event (namn, agare, starttid, sluttid)
        VALUES ('$namn', '$agare', '$start', '$slut')";
    
        if (mysqli_query($conn, $sql)) {
            echo "Nytt event lagrat";
        } else {
            echo "Error: " .$sql . "
            " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    header( "Refresh:1; index.php");
    
}

?>