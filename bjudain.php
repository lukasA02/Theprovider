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

  $sql="SELECT * FROM rattigheter";
  $result = mysqli_query($conn, $sql);
 
 if (mysqli_num_rows($result) > 0) {
   // output data of each row
   
   
   while($row = mysqli_fetch_assoc($result)) {
     //echo "id: " . $row["rattigheterID"]. " - Event: " . $row["EventID"]. " Använade: " . $row["AnvandarID"]. "<br>";
     $ratt = array("id"=>$row["rattigheterID"], "Event"=>$row["EventID"], "Användare"=>$row["AnvandarID"] );
     echo json_encode($ratt);
   }
 } else {
   echo "0 results";
 }
 
 mysqli_close($conn);
 




?>