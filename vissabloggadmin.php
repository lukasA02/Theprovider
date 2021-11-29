<?php
require_once "conn.php";
require_once 'verifiera.php';

if(isset($_GET['aid'], $_GET['hash'])){
 
  if(verifiera($_GET['hash'], $_GET['aid']) && $behorighet ==  1) {

    $sql = "SELECT Titel, Beskrivning, AnvandarID FROM blogg ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_array($result)) {
        $dat = array("Blogg titel"=>$row["Titel"], "Beskrivning"=>$row["Beskrivning"], "skapparen av bloggen"=>$row["AnvandarID"]);
        echo json_encode($dat);
      }
    }

    $sql = "SELECT InlaggID, Rubrik, Innehall FROM meddelande ";
    $result = mysqli_query($conn,$sql);
    if (mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_array($result)) {
        $dat = array("Inläggets ID"=>$row["InlaggID"], "Rubrik"=>$row["Rubrik"], "Innehåll"=>$row["Innehall"]);
        echo json_encode($dat);
      }
    }

}else{
  $Error = "Fel hashnyckel/aid";
  echo json_encode($Error);
}

}else{
  $Error ="Välj aid, hash och BloggID";
  echo json_encode($Error);
}
?>
