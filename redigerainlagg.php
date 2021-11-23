<?php
require_once "verifiera.php";

if(isset($_GET['hash'], $_GET['aid'])) {
    if(verifiera($_GET['hash'], $_GET['aid'])) {
        $aid = $_GET['aid'];
        if(isset($_GET['meddelandeid'], $_GET['innehall']) || isset($_GET['meddelandeid'], $_GET['rubrik']) || isset($_GET['meddelandeid'], $_GET['rubrik'], $_GET['innehall'])) {
            $meddelandeid = $_GET['meddelandeid'];
            if(isset($_GET['innehall']))
                $innehall = $_GET['innehall'];
            if(isset($_GET['rubrik']))
                $rubrik = $_GET['rubrik'];

            $sql = "SELECT * FROM meddelande WHERE MeddelandeID = $meddelandeid && Anvandare = $aid";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                if(isset($_GET['rubrik'], $_GET['innehall'])) {
                    $sql = "UPDATE meddelande SET Innehall = '$innehall', Rubrik = '$rubrik' WHERE MeddelandeID = $meddelandeid && Anvandare = $aid";
                }
                else if(isset($_GET['innehall']))
                    $sql = "UPDATE meddelande SET Innehall = '$innehall' WHERE MeddelandeID = $meddelandeid && Anvandare = $aid";
                else if(isset($_GET['rubrik']))
                    $sql = "UPDATE meddelande SET Rubrik = '$rubrik' WHERE MeddelandeID = $meddelandeid && Anvandare = $aid";
    
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
            } else {
              echo json_encode(array("Fel"));
            }

            
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