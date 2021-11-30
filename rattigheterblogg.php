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
                
                $sql = "UPDATE blogg SET Rattigheter = ? WHERE bloggid = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii", $rattigheter, $bloggid);
                $stmt->execute();
                
                $vs = array();
                    array_push($vs, array(
                        "Result"=>true,
                    ));
                echo json_encode($vs);
                mysqli_close($conn);
            }else{
                $vissa = "0 = privat<br>
                1 = öppen för företaget<br>
                2 = öppen för alla
                ";
                echo json_encode($vissa);
            }
        }else{
            $välj = "Välj bloggid och rattigheter";
            echo json_encode($välj);
        }
    }else{
    $Error = "misslyckad verifiering";
    echo json_encode($Error);
    }
}else{
$Error = "Logga in";
echo json_encode($Error);
}
?>