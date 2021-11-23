<?php
    require_once 'verifiera.php';

    if(isset($_GET['aid']) && isset($_GET['hash'])){

        if(verifiera($_GET['hash'], $_GET['aid'])){

    if(isset($behorighet)) {
        if($behorighet == 1) {
            if(isset($_GET['bloggid'])) {
                $bloggid = $_GET['bloggid'];

                if(isset($_GET['tabort'])){
                    $sql = "SELECT * FROM blogg WHERE BloggID = $bloggid";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $sql = "DELETE FROM blogg WHERE BloggID = $bloggid";

                        $blogg = array();
                        if (mysqli_query($conn, $sql)) {
                            array_push($blogg, array(
                                "Result"=>true,
                            ));
                        } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
    
                        echo json_encode($blogg);
                    } else {
                      echo json_encode(array("Fel: blogg med bloggid: $bloggid finns inte"));
                    }
                }

                if(isset($_GET['last'])){
                    $sql = "SELECT * FROM blogg WHERE BloggID = $bloggid";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $sql = "UPDATE blogg SET Last = 1 WHERE BloggID = $bloggid";

                        $blogg = array();
                        if (mysqli_query($conn, $sql)) {
                            array_push($blogg, array(  
                                "Result"=>true,
                            ));
                        } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        echo json_encode($blogg);
                    } else {
                      echo json_encode(array("Fel: blogg med bloggid: $bloggid finns inte"));
                    }
                }

                if(isset($_GET['lastupp'])){
                    $sql = "SELECT * FROM blogg WHERE BloggID = $bloggid";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $sql = "UPDATE blogg SET Last = 0 WHERE BloggID = $bloggid";

                        $blogg = array();
                        if (mysqli_query($conn, $sql)) {
                            array_push($blogg, array(  
                                "Result"=>true,
                            ));
                        } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        echo json_encode($blogg);
                    } else {
                      echo json_encode(array("Fel: blogg med bloggid: $bloggid finns inte"));
                    }
                }
                mysqli_close($conn);
            }
        }
    }
    else{
        echo "Logga in";
    }
    }else{
        echo "felmeddelande2";
    }

}else{
    echo "felmeddelande";
}

?>