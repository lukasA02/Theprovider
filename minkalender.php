<?php
require_once 'behorighet.php';
require_once 'conn.php';

// Användare
$sql = "SELECT * FROM event WHERE Agare = '$anvandarid'";
$sql2 = "SELECT event.EventID, event.Agare, event.Namn, event.Starttid, event.Sluttid, anvandare.Anvnamn FROM anvandare JOIN rattigheter ON rattigheter.AnvandarID=anvandare.AnvandarID JOIN event ON event.EventID=rattigheter.EventID WHERE anvandare.AnvandarID='$anvandarid  '";
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
      "Agare"=>$row["Agare"],
      "Starttid"=>$row["Starttid"],
      "Sluttid"=>$row["Sluttid"]
    ));
  }
}
echo json_encode($events);
mysqli_close($conn);
        
//SELECT event.Namn, anvandare.Anvnamn FROM anvandare JOIN rattigheter ON rattigheter.AnvandarID=anvandare.AnvandarID JOIN event ON event.EventID=rattigheter.EventID;
?>