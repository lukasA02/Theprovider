<?php
require_once "behorighet.php";
require_once "conn.php";

if(isset($_GET['inlaggid'], $_GET['rubrik'], $_GET['innehall'])) {
    $inlaggid = $_GET['inlaggid'];
    $rubrik = $_GET['rubrik'];
    $innehall = $_GET['innehall'];

    if(isset($_GET['taggid']))
        $taggid = $_GET['taggid'];
    else
        $taggid = 'NULL';

    $sql = "INSERT INTO meddelande (InlaggID, Rubrik, Innehall, TaggID)
    VALUES ($inlaggid, '$rubrik', '$innehall', $taggid)";

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
else if(isset($_GET['kommentarer'], $_GET['bloggid'])) {
    $kommentarer = $_GET['kommentarer'];
    $bloggid = $_GET['bloggid'];

    $sql = "UPDATE blogg SET Kommentarer = $kommentarer WHERE BloggID = $bloggid";

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
?>