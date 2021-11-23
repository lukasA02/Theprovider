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

        if(isset($_GET['taggid']))
            $taggid = $_GET['taggid'];
        else
            $taggid = 'NULL';

            $sql = "SELECT * FROM blogg WHERE BloggID = $bloggid";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $sql = "UPDATE blogg SET TaggID = $taggid, Last = $last, Beskrivning = '$beskrivning', Titel = '$titel' WHERE BloggID = $bloggid";

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
            } else {
              echo json_encode(array("Fel"));
            }
        
    }
    else{
        echo "Fyll i alla fält";}

    }else{
        echo "Kan inte logga in";
    }

} else{
    echo "Logga in";
}
?>