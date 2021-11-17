<?php
    require_once "behorighet.php";
    require_once "conn.php";
    require_once 'verifiera.php';

    // $_GET['anv'] =1;
    // $_GET['hash'] = 123456;

    if(isset($_GET['aid']) && isset($_GET['hash'])){

        if(verifiera($_GET['hash'], $_GET['aid'])){

    if(isset($behorighet)) {
        if($behorighet == 1) {
            if(isset($_GET['bloggid'])) {
                $bloggid = $_GET['bloggid'];

                if(isset($_GET['tabort'])){

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

                }

                if(isset($_GET['last'])){

                  

                    $sql2 = "UPDATE blogg SET Last='1' WHERE BloggID =  $bloggid ";

                    $blogg1 = array();
                    if (mysqli_query($conn, $sql2)) {
                        array_push($blogg1, array(  
                            "Result"=>true,
                        ));
                    } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    echo json_encode($blogg1);
                
             
                }

                if(isset($_GET['lastupp'])){

                  

                    $sql3 = "UPDATE blogg SET Last='0' WHERE BloggID =  $bloggid ";

                    $blogg2 = array();
                    if (mysqli_query($conn, $sql3)) {
                        array_push($blogg2, array(  
                            "Result"=>true,
                        ));
                    } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    echo json_encode($blogg2);
                
             

                }


                

                
                mysqli_close($conn);

               
            }

        


        }

    }


    else{
        echo "Logga in";}

    }else{
        echo "felmeddelande2";
    }

}else{
    echo "felmeddelande";
}

?>