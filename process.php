<?php
//input för event
include 'conn.php';
require_once 'verifiera.php';

if(isset($_GET['aid']) && isset($_GET['hash'])){

    if(verifiera($_GET['hash'],$_GET['aid'])){


    if(isset($_GET['namn']) && isset($_GET['Agare']) && isset($_GET['starttid']) && isset($_GET['sluttid']) &&isset($_GET["beskrivning"])){
    $namn = $_GET['namn'];
    $agare = $_GET['Agare'];
    $beskrivning = $_GET["beskrivning"];
    $start = $_GET['starttid'];
    $slut = $_GET['sluttid'];

    $sql = "SELECT * FROM event WHERE (Starttid >= '$start' AND Sluttid <= '$slut' AND Agare = '$agare');";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $redan = "Redan bokat"
        echo json_encode($redan);
    } else {
        $sql="INSERT INTO event (namn, agare, starttid, sluttid, beskrivning)
        VALUES ('$namn', '$agare', '$start', '$slut', '$beskrivning')";

        if (mysqli_query($conn, $sql)) {
            $nytt = "Nytt event lagrat";
            echo json_encode($nytt);
        } else {
            $Error = "Error: " .$sql . "
            " . mysqli_error($conn);
            echo json_encode($Error);

        }

    }

    mysqli_close($conn);

    }else{
        $Error = "fel input: " .$sql . "
        " . mysqli_error($conn);
        echo json_encode($Error);
    }

        
    
}else{
    $Error = "misslyckad verifiering"
    echo json_encode($Error);
    }
}else{
    $output = "fel"; 
  echo json_encode($output);
}

?>