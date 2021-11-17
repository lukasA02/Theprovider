<?php
require_once "verifiera.php";

if(isset($_GET['hash'], $_GET['aid'])) {
    if(verifiera($_GET['hash'], $_GET['aid'])) {
        $aid = $_GET['aid'];
        if(isset($_GET['meddelandeid'])) {
            $mid = $_GET['meddelandeid'];
            
            $sql = "DELETE FROM meddelande WHERE MeddelandeID = $mid && Anvandare = $aid";

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
            echo "Välj meddelandeid";
    }
    else
        echo "Kunde inte logga in";
}
else
    echo "Logga in";
?>