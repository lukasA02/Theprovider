<?php
require_once "verifiera.php";
/*
Blogg rättigheter
0 = privat
1 = öppen för företaget
2 = öppen för alla
*/

if(isset($_GET['hash'], $_GET['aid'])) {
    if(verifiera($_GET['hash'], $_GET['aid'])) {
        $aid = $_GET['aid'];
        if(isset($_GET['bloggid'], $_GET['rattigheter'])) {
            $bloggid = $_GET['bloggid'];
            $rattigheter = $_GET['rattigheter'];
            if($rattigheter <= 2 && $rattigheter >= 0) {
                
                $sql = "UPDATE blogg SET Rattigheter = $rattigheter WHERE AnvandarID = $aid";
                
                $vs = array();
                if (mysqli_query($conn, $sql)) {
                    array_push($vs, array(
                        "Result"=>true,
                    ));
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                echo json_encode($vs);
                mysqli_close($conn);
            }
            else
                echo "0 = privat<br>
                1 = öppen för företaget<br>
                2 = öppen för alla
                ";
        }
        else
            echo "Välj bloggid och rattigheter";
    }
    else
        echo "Kunde inte logga in";
}
else
    echo "Logga in";
?>