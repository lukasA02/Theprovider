<?php
    require_once "behorighet.php";
    require_once "conn.php";
    require_once 'verifiera.php';

    if(isset($_GET['anv']) && isset($_GET['hash'])){

        if(verifiera($_GET['hash'],$_GET['anv'])==TRUE ){

    if(isset($_GET['anvandarid'], $_GET['last'], $_GET['beskrivning'], $_GET['titel'])) {
        $anvandarid = $_GET['anvandarid'];
        $last = $_GET['last'];
        $beskrivning = $_GET['beskrivning'];
        $titel = $_GET['titel'];
        
        // Om skaparen av bloggen har valt en tagg
        if(isset($_GET['taggid']))
            $taggid = $_GET['taggid'];
        else
            $taggid = 'NULL';

        $sql = "INSERT INTO `blogg` (`AnvandarID`, `TaggID`, `Last`, `Beskrivning`, `Titel`) 
        VALUES ($anvandarid, $taggid, $last, '$beskrivning', '$titel')";
        
        $blogg = array();
        if (mysqli_query($conn, $sql)) {
            array_push($blogg, array(
                "Result"=>true,
                "BloggID"=>mysqli_insert_id($conn)
              ));
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        echo json_encode($blogg);
        mysqli_close($conn);
    }
    else{
        echo "Fyll i alla fält";}

    }else{
        echo "felmedelande2";
    }

}   else{
    echo "felmedelande";
}
?>