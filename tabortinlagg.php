<?php
require_once "verifiera.php";

if(isset($_GET['hash'], $_GET['aid'])) {
    if(verifiera($_GET['hash'], $_GET['aid'])) {
        $aid = $_GET['aid'];
        if(isset($_GET['meddelandeid'])) {
            $mid = $_GET['meddelandeid'];
            if($behorighet != 1)
                $sql = "SELECT * FROM meddelande WHERE MeddelandeID = $mid && Anvandare = $aid";
                else
                    $sql = "SELECT * FROM meddelande WHERE MeddelandeID = $mid";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        if($behorighet != 1)
                        $sql = "DELETE FROM meddelande WHERE MeddelandeID = $mid && Anvandare = $aid";
                        else
                        $sql = "DELETE FROM meddelande WHERE MeddelandeID = $mid";

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
                    } else {
                      echo json_encode(array("Fel"));
                    }
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