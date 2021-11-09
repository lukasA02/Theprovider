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
    <form action="skapainlagg.php" method="GET">
        <input type="text" name="bloggid" placeholder="BloggID">
        <input type="text" name="rubrik" placeholder="Rubrik">
        <input type="text" name="innehall" placeholder="Innehåll">
        <input type="text" name="taggid" placeholder="TaggID">
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
    echo "Omöjligt att logga in";
}

}else{
    echo "Logga in";
}
?>