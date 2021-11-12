<?php
require_once "../conn.php";
require_once '../behorighet.php';


// $_GET['anv'] =1;
// $_GET['hash'] = 123456;

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
  <link rel="stylesheet" href="style-gen.css">

  <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous">
  </script>

</head>

<body>
<iframe src="ram.php" style="
            position: fixed;
            top: 0px;
            bottom: 0px;
            right: 0px;
            width: 230px;
            border: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            z-index: 999999;
            height: 100px;
        "></iframe>
  <div id="resultat"></div>

  <button class="knapp" onclick="runshiiiht3('anv','losen')">Visa Event!</button>

  <div class="form">
    <form action="../bjudain.php" method="GET">
       <input type="text" name="eventid" placeholder="eventets ID" >
       <input type="text" name="anvandarid" placeholder="id på vem du ska bjuda in">
       <input type="text" name="aid" placeholder="AnvändarID">
       <input type="text" name="key" placeholder="hash key">
        <input type="submit" name="submit">
    </form>
    </div>


<script src="rattigheter.js"></script>
</body>
</html>