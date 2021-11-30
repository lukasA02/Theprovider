<?php
    //require_once "behorighet.php";
    require_once "conn.php";
    require_once 'verifiera.php';


    if(isset($_GET['aid']) && isset($_GET['hash'])){

        if(verifiera($_GET['hash'], $_GET['aid'])){

    if(isset($behorighet)) {
        if($behorighet == 1) {
            if(isset($_GET['bloggid'])) {
                $bloggid = $_GET['bloggid'];

                if(isset($_GET['tabort'])){

                    $sql = "DELETE FROM blogg WHERE BloggID = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $bloggid);
                    $stmt->execute();

                    $blogg = array();
                        array_push($blogg, array(
                            "Result"=>true,
                        ));
                    echo json_encode($blogg);

                }

                if(isset($_GET['last'])){
                    $sql2 = "UPDATE blogg SET Last='1' WHERE BloggID = ?";
                    $stmt = $conn->prepare($sql2);
                    $stmt->bind_param("i", $bloggid);
                    $stmt->execute();

                    $blogg1 = array();
                        array_push($blogg1, array(  
                            "Result"=>true,
                        ));
                    echo json_encode($blogg1);
                }

                if(isset($_GET['lastupp'])){
                    $sql3 = "UPDATE blogg SET Last='0' WHERE BloggID = ?";
                    $stmt = $conn->prepare($sql3);
                    $stmt->bind_param("i", $bloggid);
                    $stmt->execute();

                    $blogg2 = array();
                        array_push($blogg2, array(  
                            "Result"=>true,
                        ));
                    echo json_encode($blogg2);
                }
                mysqli_close($conn);

               
            }

        


        }

    }


    else{
        $Error = "Logga in";
    echo json_encode($Error);
    }

    }else{
        $Error = "misslyckad verifiering";
        echo json_encode($Error);
    }

}else{
    $Error = "logga in ";
    echo json_encode($Error);
}

?>