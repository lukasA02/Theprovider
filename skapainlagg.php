<?php
require_once "conn.php";
require_once 'verifiera.php';


if(isset($_GET['aid']) && isset($_GET['hash'])){

    if(verifiera($_GET['hash'],$_GET['aid'])){
        $aid = $_GET['aid'];
        if(isset($_GET['bloggid'], $_GET['rubrik'], $_GET['innehall'])) {
            $bloggid = $_GET['bloggid'];
            $rubrik = $_GET['rubrik'];
            $innehall = $_GET['innehall'];

            if(isset($_GET['taggid']))
                $taggid = $_GET['taggid'];
            else
                $taggid = 'NULL';

            $sql = "INSERT INTO meddelande (BloggID, Rubrik, Innehall, TaggID, Anvandare)
            VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issii", $bloggid, $rubrik, $innehall, $taggid, $aid);
            $stmt->execute();

            $inlagg = array();
                array_push($inlagg, array(
                    "Result"=>true,
                    "MeddelandeID"=>mysqli_insert_id($conn)
                ));
            echo json_encode($inlagg);
            mysqli_close($conn);
        }
        else {
            $välj = "Välj bloggid, rubrik och innehåll";
            echo json_encode($välj);
        }

    } else {
        $Error = " misslyckad verifiering";
        echo json_encode($Error);
    }

}else{
    $Error = "Logga in";
    echo json_encode($Error);
}
?>