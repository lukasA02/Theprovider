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
        echo "Redan bokat";
    } else {
        $sql="INSERT INTO event (namn, agare, starttid, sluttid, beskrivning)
        VALUES ('$namn', '$agare', '$start', '$slut', '$beskrivning')";

        if (mysqli_query($conn, $sql)) {
            echo "Nytt event lagrat";
        } else {
            echo "Error: " .$sql . "
            " . mysqli_error($conn);

        }

    }

    mysqli_close($conn);

    }else{

        echo "fel input: " .$sql . "
            " . mysqli_error($conn);


    }

        
    
}else{
        echo "Går inte att logga in";
    }
}else{
    echo "Logga in";
}

?>