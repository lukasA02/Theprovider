
<?php
require_once 'conn.php';
require_once 'verifiera.php';


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
    $res = "0 results";
    echo json_encode($ras);
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
    else{
    $Error = "Du är inte admin";
      echo json_encode($Error);
    }
  }else{
    $Error = "misslyckad verifiering"
    echo json_encode($Error);
  }

}else{
  $output = "fel"; 
  echo json_encode($output);
}



//SELECT event.Namn, anvandare.Anvnamn FROM anvandare JOIN rattigheter ON rattigheter.AnvandarID=anvandare.AnvandarID JOIN event ON event.EventID=rattigheter.EventID;
?>