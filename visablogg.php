<?php
require_once "verifiera.php";

$sql = "SELECT BloggID, AnvandarID, TaggID, Beskrivning, Titel FROM blogg WHERE Last = 0";
$result = mysqli_query($conn, $sql);
$blogg = array();
if(mysqli_query($conn, $sql)) {
  while($row = mysqli_fetch_array($result)) {
    array_push($blogg, array("BloggID"=>$row["BloggID"], "AnvandarID"=>$row["AnvandarID"], 
    "TaggID"=>$row["TaggID"], "Beskrivning"=>$row["Beskrivning"], "Titel"=>$row["Titel"]));
  }
  echo json_encode($blogg);
}
?>