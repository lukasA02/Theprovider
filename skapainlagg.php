<?php
require_once "behorighet.php";
require_once "conn.php";
require_once 'verifiera.php';

if(isset($_GET['anv']) && isset($_GET['hash'])){

    if(verifiera($_GET['hash'],$_GET['anv'])==TRUE ){

if(isset($_GET['bloggid'], $_GET['rubrik'], $_GET['innehall'])) {
    $bloggid = $_GET['bloggid'];
    $rubrik = $_GET['rubrik'];
    $innehall = $_GET['innehall'];

    if(isset($_GET['taggid']))
        $taggid = $_GET['taggid'];
    else
        $taggid = 'NULL';

    $sql = "INSERT INTO meddelande (BloggID, Rubrik, Innehall, TaggID)
    VALUES ($bloggid, '$rubrik', '$innehall', $taggid)";

    $inlagg = array();
    if (mysqli_query($conn, $sql)) {
        array_push($inlagg, array(
            "Result"=>true,
            "MeddelandeID"=>mysqli_insert_id($conn)
          ));
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    echo json_encode($inlagg);
    mysqli_close($conn);
}
else{
    echo "Välj bloggid, rubrik och innehåll";}

}else{
    echo "felmedelande2";
}

}else{
    echo "felmedelande";
}
?>