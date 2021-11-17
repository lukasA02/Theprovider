<?php
require_once "verifiera.php";

if(isset($_GET['hash'], $_GET['aid'])) {
    if(verifiera($_GET['hash'], $_GET['aid'])) {
        $aid = $_GET['aid'];
        if(isset($_GET['meddelandeid'], $_GET['innehall']) || isset($_GET['meddelandeid'], $_GET['rubrik'])) {
            $meddelandeid = $_GET['meddelandeid'];
            $innehall = $_GET['innehall'];
            $rubrik = $_GET['rubrik'];

            if(isset($_GET['rubrik'], $_GET['innehall'])) {
                $sql = "UPDATE meddelande SET Innehall = '$innehall', Rubrik = '$rubrik' WHERE MeddelandeID = $meddelandeid && Anvandare = $aid";
            }
            else if(isset($_GET['innehall']))
                $sql = "UPDATE meddelande SET Innehall = '$innehall' WHERE MeddelandeID = $meddelandeid && Anvandare = $aid";
            else if(isset($_GET['rubrik']))
                $sql = "UPDATE meddelande SET Innehall = '$rubrik' WHERE MeddelandeID = $meddelandeid && Anvandare = $aid";

            $vs = array();
            if(mysqli_query($conn, $sql)) {
                array_push($vs, array(
                    "Result"=>true
                ));
            }
            else
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);

            echo json_encode($vs);
            mysqli_close($conn);
        }
        else
            echo "Välj meddelandeid, innehall och/eller rubrik";
    }
    else
        echo "Kunde inte logga in";
}
else
    echo "Logga in";
?>