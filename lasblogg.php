<?php
    require_once "behorighet.php";
    require_once "conn.php";

    if(isset($behorighet))
        if($behorighet == 1) {
            if(isset($_GET['bloggid']) && isset($_GET['last'])) {
                $bloggid = $_GET['bloggid'];
                $last = $_GET['last'];

                $sql = "UPDATE blogg SET last = $last WHERE BloggID = $bloggid";
                
                $blogg = array();
                if (mysqli_query($conn, $sql)) {
                    array_push($blogg, array(
                        "Result"=>true                  
                    ));
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                echo json_encode($blogg);
                mysqli_close($conn);
            }
        }
?>