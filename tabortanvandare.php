<?php

require_once "conn.php";
require_once 'verifiera.php';

if(isset($_GET['aid'], $_GET['hash'])) {
    if(verifiera($_GET['hash'], $_GET['aid'])) {
        if($behorighet == 1) {
            if(isset($_GET['anvid'])) {
                $anvid = $_GET['anvid'];
                $sql = "DELETE FROM anvandare WHERE AnvandarID = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $anvid);
                $stmt->execute();
                
                echo "Anvandare borttagen";
                
                mysqli_close($conn);
            } else{
                echo "Inget anvid";
            }

        } else {
            echo "Du är inte admin";
        }

    } else {
        echo "Ej inloggad";
    }
}
?>