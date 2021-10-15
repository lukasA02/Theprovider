<?php
//input för event
include 'conn.php';
if(isset ($_POST['submit']))
{
    if(isset($_POST['namn']) && isset($_POST['starttid']) && isset($_POST['sluttid']))
    $namn = $_POST['namn'];
    $agare = $_POST['Agare'];
    $start = $_POST['starttid'];
    $slut = $_POST['sluttid'];

    $sql = "SELECT * FROM event WHERE (Starttid >= '$start' AND Sluttid <= '$slut' AND Agare = '$agare');";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
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

    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("sss", $start, $slut, $agare);

    // if ($stmt->execute()) {
    //     $result = $stmt->get_result();
    //     $num_rows = $result->num_rows;
    // }

    // if ($num_rows > 0) {
    //     echo "Redan bokat";
    // } else {
    //     $sql="INSERT INTO event (namn, agare, starttid, sluttid)
    //     VALUES ('$namn', '$agare', '$start', '$slut')";
    
    //     if (mysqli_query($conn, $sql)) {
    //         echo "Nytt event lagrat";
    //     } else {
    //         echo "Error: " .$sql . "
    //         " . mysqli_error($conn);
    //     }

    //     mysqli_close($conn);
    // }    
}

?>