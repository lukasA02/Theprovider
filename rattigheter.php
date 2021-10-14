<?php 
require_once "conn.php";
require_once 'behorighet.php';

if($behorighet == 1)
  echo " det är över";




 /*$sql="INSERT INTO rattigheter 
        VALUES (null,'2', '2')";
    
        if (mysqli_query($conn, $sql)) {
            echo "True";
        } else {
            echo "False " .$sql . "
            " . mysqli_error($conn);
        }*/

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