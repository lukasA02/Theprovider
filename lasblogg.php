<?php
    require_once "conn.php";
    require_once "verifiera.php";


    if(isset($_GET['aid']) && isset($_GET['hash'])){

        if(verifiera($_GET['hash'],$_GET['aid'])){

    if(isset($behorighet)) {
        if($behorighet == 1) {
            if(isset($_GET['bloggid']) && isset($_GET['last'])) {
                $bloggid = $_GET['bloggid'];
                $last = $_GET['last'];

                $sql = "UPDATE blogg SET last = ? WHERE BloggID = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii", $last, $bloggid);
                $stmt->execute();

                $blogg = array();
                    array_push($blogg, array(
                        "Result"=>true
                    ));
                echo json_encode($blogg);
                mysqli_close($conn);
            }
        }
        else
            echo "Välj bloggid och last";
    }
    else {
        echo "Logga in";
    }

    }else{
        echo "Det går inte att logga in";
    }

}else{
    echo "Logga in";
}
?>