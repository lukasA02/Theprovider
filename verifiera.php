<?php
require_once "conn.php";

function verifiera($key,$aid) {
$sql = "SELECT AnvandarID, Behorighet, Anvnamn, Hashkey, Inloggtid FROM anvandare WHERE
AnvandarID = $aid && Hashkey = $key";
//&& Inloggtid > DATE_SUB(now(), INTERVAL 10 MINUTE)
// ?????????
global $conn;
global $behorighet;
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1) {
    $tid = new DateTime('now');
    date_default_timezone_set("Europe/Stockholm");
    $tid = date('Y-m-d H:i:s');

    $sql = "UPDATE anvandare SET Inloggtid = '$tid' WHERE AnvandarID = $aid";
    $result = mysqli_query($conn, $sql);

    $sql = "SELECT Behorighet FROM anvandare WHERE AnvandarID = $aid";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $behorighet = $row['Behorighet'];
      }
    }
    else
        echo "0 resultat";
    return true;
}
    else {
        return false;
}
// Kolla datumstämpel och uppdatera den
// js
}
?>