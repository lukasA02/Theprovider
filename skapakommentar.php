<?php
// require_once "behorighet.php";
require_once "conn.php";
require_once 'verifiera.php';

// $_GET['anv'] =1;
// $_GET['hash'] = 123456;

if(isset($_GET['aid']) && isset($_GET['hash'])){

    if(verifiera($_GET['hash'],$_GET['aid'])){
        $aid = $_GET['aid'];

if(isset($_GET['inlaggid'], $_GET['rubrik'], $_GET['innehall'])) {
    $inlaggid = $_GET['inlaggid'];
    $rubrik = $_GET['rubrik'];
    $innehall = $_GET['innehall'];

    if(isset($_GET['taggid']))
        $taggid = $_GET['taggid'];
    else
        $taggid = 'NULL';

    $sql = "INSERT INTO meddelande (InlaggID, Rubrik, Innehall, TaggID, Anvandare)
    VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issii", $inlaggid, $rubrik, $innehall, $taggid, $aid);
    $stmt->execute();

    $inlagg = array();
        array_push($inlagg, array(
            "Result"=>true,
            "MeddelandeID"=>mysqli_insert_id($conn)
          ));
    echo json_encode($inlagg);
    mysqli_close($conn);
}
else{
    echo "Välj inläggid, rubrik och innehåll";}

}else{
    echo "Går inte att logga in";
}

}else{
    echo "Logga in";
}
?>