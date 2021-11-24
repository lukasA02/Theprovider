<?php
require_once "verifiera.php";

$sql = "SELECT  AnvandarID, Beskrivning, Titel FROM blogg WHERE Rattigheter = 2";
$result = mysqli_query($conn, $sql);
$blogg = array();
if(mysqli_query($conn, $sql)) {
  while($row = mysqli_fetch_array($result)) {
    array_push($blogg, array("Blogg titel"=>$row["Titel"], "Beskrivning"=>$row["Beskrivning"], "skapparen av bloggen"=>$row["AnvandarID"]));
  }
  echo json_encode($blogg);
} 
?>