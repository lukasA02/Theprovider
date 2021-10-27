<?php
    require_once "behorighet.php";
    require_once "conn.php";

    if(isset($_GET['titel'], $_GET['bloggid'], $_GET['last'], $_GET['beskrivning'])) {
        $last = $_GET['last'];
        $bloggid = $_GET['bloggid'];
        $beskrivning = $_GET['beskrivning'];
        $titel = $_GET['titel'];
        
        if(isset($_GET['taggid']))
            $taggid = $_GET['taggid'];
        else
            $taggid = 'NULL';

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
    }
    else
        echo "Fyll i alla fält";
?>