<?php
require_once "conn.php";
if(isset($_GET["EventN"]) && isset($_GET["anvandarid"])){

  $EN = $_GET["EventN"];
  $AID = $_GET["anvandarid"];
}
$sql = "INSERT INTO rattigheter (rattigheterID, EventID, AnvandarID)
  VALUES (null, $EN, $AID)";
  
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);






?>