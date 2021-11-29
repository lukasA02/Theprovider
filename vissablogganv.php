<?php
require_once "conn.php";
require_once 'verifiera.php';

if(isset($_GET['aid'], $_GET['hash'])){
 
  if(verifiera($_GET['hash'], $_GET['aid']) && $behorighet ==  3) {

    $sql = "SELECT Titel, Beskrivning, AnvandarID FROM blogg WHERE Rattigheter = 1 OR Rattigheter = 2";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $blogg = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($blogg);

    $sql = "SELECT InlaggID, Rubrik, Innehall FROM meddelande";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $inlagg = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($inlagg);
  
}else{
  $Error = "Fel hashnyckel/aid";
  echo json_encode($Error);
}

}else{
  $Error ="Välj aid, hash och BloggID";
  echo json_encode($Error);
}
?>
