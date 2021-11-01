<?php
    require_once "behorighet.php";
    require_once "conn.php";
    require_once 'verifiera.php';

    $_GET['anv'] =1;
    $_GET['hash'] = 123456;

    if(isset($_GET['anv']) && isset($_GET['hash'])){

        if(verifiera($_GET['hash'],$_GET['anv'])==TRUE ){

    if(isset($behorighet)) {
        if($behorighet == 1) {
            if(isset($_GET['bloggid'])) {
                $bloggid = $_GET['bloggid'];

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