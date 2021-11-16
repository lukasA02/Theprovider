<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
<iframe src="frontend/ram.php" style="
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
</body>
</html>
<?php
require_once 'conn.php';
require_once 'verifiera.php';

// $_GET['anv'] = 1;
// $_GET['hash'] = 123456789;

if(isset($_GET['aid']) && isset($_GET['hash'])){

  if(verifiera($_GET['hash'],$_GET['aid'])){
    if($behorighet == 1) {
// Användare
  $anvandarid=$_GET['aid'];
  $sql = "SELECT * FROM event";
  $sql2 = "SELECT event.EventID, event.Agare, event.Namn, event.beskrivning, event.Starttid, event.Sluttid, anvandare.Anvnamn FROM anvandare JOIN rattigheter ON rattigheter.AnvandarID=anvandare.AnvandarID JOIN event ON event.EventID=rattigheter.EventID WHERE anvandare.AnvandarID='$anvandarid  '";
  $result = mysqli_query($conn, $sql);

  $events = array();

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
          // echo "ID: " . $row["EventID"] . " Namn: " . $row["Namn"] . " Ägare: " . $row["Agare"] .
          // " Starttid: ". $row["Starttid"] . " Sluttid: " . $row["Sluttid"];
         /* $events[] = array(
              "ID"=>$row["EventID"],
              "Namn"=>$row["Namn"],
              "Agare"=>$row["Agare"],
              "Starttid"=>$row["Starttid"],
              "Sluttid"=>$row["Sluttid"]
          );
          */
      array_push($events, array(
        "ID"=>$row["EventID"],
        "Namn"=>$row["Namn"],
        "beskrivning"=>$row["beskrivning"],
        "Agare"=>$row["Agare"],
        "Starttid"=>$row["Starttid"],
        "Sluttid"=>$row["Sluttid"]
      ));
    }
  } else {
    echo "0 results";
  }
  $result2 = mysqli_query($conn,$sql2);

  if (mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_assoc($result2)) {
      //var_dump($row);
      array_push($events, array(
        "ID"=>$row["EventID"],
        "Namn"=>$row["Namn"],
        "beskrivning"=>$row["beskrivning"],
        "Agare"=>$row["Agare"],
        "Starttid"=>$row["Starttid"],
        "Sluttid"=>$row["Sluttid"]
      ));
    }
  }
  echo json_encode($events);
  mysqli_close($conn);

    }
    else
      echo "Du är inte admin";
  }else{
    echo "Går inte att logga in";
  }

}else{
  echo "Logga in";
}



//SELECT event.Namn, anvandare.Anvnamn FROM anvandare JOIN rattigheter ON rattigheter.AnvandarID=anvandare.AnvandarID JOIN event ON event.EventID=rattigheter.EventID;
?>