<?php
require_once 'verifiera.php';

if(isset($_GET['aid'], $_GET['hash'])) {
    if(verifiera($_GET['hash'], $_GET['aid'])) {
        if($behorighet == 1) {
            if(isset($_GET['anvid'])) {
                $anvid = $_GET['anvid'];
                $sql = "DELETE FROM anvandare WHERE AnvandarID = $anvid";
                
                if (mysqli_query($conn, $sql)) {
                    echo "Anvandare borttagen";
                  } else {
                    echo "Fel: " . $sql . "<br>" . mysqli_error($conn);
                  }
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