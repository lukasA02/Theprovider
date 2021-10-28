<?php
//input för event
include 'conn.php';
require_once 'behorighet.php';
require_once 'verifiera.php';

if(isset($_GET['anv']) && isset($_GET['hash'])){
    
    if(verifiera($_GET['hash'],$_GET['anv'])==TRUE ){
    
if(isset ($_GET['submit']))
{
    if(isset($_GET['namn']) && isset($_GET['starttid']) && isset($_GET['sluttid']))
    $namn = $_GET['namn'];
    $agare = $_GET['Agare'];
    $start = $_GET['starttid'];
    $slut = $_GET['sluttid'];

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
die;
    header( "Refresh:1; index.php");
}
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
    }else{
        echo "Fuck you2";
    }
} else{
    echo "Fuck you1";
}

?>