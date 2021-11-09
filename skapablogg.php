<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="form">
    <form action="skapablogg.php" method="GET">
        <input type="text" name="anvandarid" placeholder="AnvändarID">
        <input type="text" name="last" placeholder="Låst? 0=nej 1=ja">
        <input type="text" name="beskrivning"placeholder="Beskrivning">
        <input type="text" name="titel"placeholder="Titel">
        <input type="submit" name="submit">
    </form>
    </div>
</body>

</html>


<?php
    require_once "conn.php";
    require_once 'verifiera.php';

    // $_GET['anv'] =1;
    // $_GET['hash'] = 123456;


    if(isset($_GET['aid']) && isset($_GET['hash'])){

        if(verifiera($_GET['hash'],$_GET['aid'])){

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
        echo "Fyll i alla fält";
    }

    }else{
        echo "Kan inte logga in";
    }

}   else{
    echo "Logga in";
}
?>