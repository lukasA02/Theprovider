<?php
require_once 'behorighet.php';
require_once 'conn.php';

 // Användare
    $sql = "SELECT * FROM event WHERE Agare = '$anvandarid'";
    $result = mysqli_query($conn, $sql);

    $events = array();
    
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        // echo "ID: " . $row["EventID"] . " Namn: " . $row["Namn"] . " Ägare: " . $row["Agare"] .
        // " Starttid: ". $row["Starttid"] . " Sluttid: " . $row["Sluttid"];
        $events[] = array(
            "ID"=>$row["EventID"],
            "Namn"=>$row["Namn"],
            "Agare"=>$row["Agare"],
            "Starttid"=>$row["Starttid"],
            "Sluttid"=>$row["Sluttid"]
        );
      }
    } else {
      echo "0 results";
    }

    echo json_encode($events);
    
    mysqli_close($conn);
        

?>