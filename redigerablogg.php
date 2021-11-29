<?php
    require_once "conn.php";
    require_once 'verifiera.php';

    if(isset($_GET['aid']) && isset($_GET['hash'])){

        if(verifiera($_GET['hash'],$_GET['aid'])){

    if(isset($_GET['titel'], $_GET['bloggid'], $_GET['last'], $_GET['beskrivning'])) {
        $last = $_GET['last'];
        $bloggid = $_GET['bloggid'];
        $beskrivning = $_GET['beskrivning'];
        $titel = $_GET['titel'];
        $taggid = 'NULL';

        if(isset($_GET['taggid']))
            $taggid = $_GET['taggid'];

        $sql = "UPDATE blogg SET TaggID = ?, Last = ?, Beskrivning = ?, Titel = ? WHERE BloggID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iissi", $taggid, $last, $beskrivning, $titel, $bloggid);
        $stmt->execute();
        $stmt->store_result();

        $blogg = array();
            array_push($blogg, array(
                "Result"=>true
              ));
        echo json_encode($blogg);
        mysqli_close($conn);
    }
    else{
        $Fyll = "Fyll i alla fält";
        echo json_encode($Fyll);
    }

    }else{
        $Error = "misslyckad verifiering"
        echo json_encode($Error);
    }

} else{
    $Error = "Logga in";
    echo json_encode($Error);
}
?>