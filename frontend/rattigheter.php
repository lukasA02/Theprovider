<?php 
require_once "../conn.php";
require_once '../behorighet.php';


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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
    <form action="bjudain.php" method="GET">
       <input type="text" name="EventN" placeholder="eventets ID" >
       <input type="text" name="anvandarid" placeholder="id på vem du ska bjuda in">
       <input type="text" name="anv" placeholder="AnvändarID">
       <input type="text" name="hash"placeholder="hash key"> 
        <input type="submit" name="submit">
    </form>




</body>
</html>