<?php
require_once "conn.php";
require_once "verifiera.php";

if(isset($_GET["eventid"], $_GET["hash"], $_GET["aid"], $_GET["anvandarid"])) {
  if(verifiera($_GET["key"], $_GET["aid"])) {

    $EN = $_GET["eventid"];
    $AID = $_GET["aid"];
    $anvandarid = $_GET["anvandarid"];

  // äger användaren eventet med valt eventid???
  $sql = "SELECT EventID, Agare FROM event WHERE Agare = $AID AND EventID = $EN";
  $result = mysqli_query($conn, $sql);

  // användaren äger eventet
  if (mysqli_num_rows($result) > 0) {
      $sql = "INSERT INTO rattigheter (rattigheterID, EventID, AnvandarID)
      VALUES (null, $EN, $anvandarid)";

      if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully";
      } else {
        $Error = "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo json_encode($Error);
      }

      $sql = "SELECT * FROM rattigheter";
      $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $ratt = array("id"=>$row["rattigheterID"], "Event"=>$row["EventID"], "Användare"=>$row["AnvandarID"] );
        echo json_encode($ratt);
      }
    } else {
      echo json_encode("0 results");
    }
  } else {
    $Error ="Du har inte tillgång till EventID: " . $EN;
    echo json_encode($Error);
  }
 mysqli_close($conn);
}
}
else {
$Error ="Fel: logga in, välj eventid och anvandarid";
  echo json_encode($Error);
}
?>