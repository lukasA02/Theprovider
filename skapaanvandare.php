<?php

require_once "conn.php";
require_once "verifiera.php";

if(isset($_GET['aid']) && isset($_GET['hash'])){

  if(verifiera($_GET['hash'],$_GET['aid'])){

if(isset($_GET["Behorighet"]) && isset($_GET["Enamn"]) && isset($_GET["Fnamn"]) && isset($_GET["Epost"]) && isset($_GET["Telefon"])){
    $Behorighet = $_GET["Behorighet"];
    $Anvnamn = $_GET["Anvnamn"];
    $Losen = $_GET["Losen"];
    $Enamn = $_GET["Enamn"];
    $Fnamn = $_GET["Fnamn"];
    $Epost = $_GET["Epost"];
    $Telefon = $_GET["Telefon"];

$uppercase = preg_match('@[A-Z]@', $Losen);
$lowercase = preg_match('@[a-z]@', $Losen);


$sql = "INSERT INTO anvandare(AnvandarID,Behorighet,Anvnamn,Losen,Enamn,Fnamn,Epost,Telefon)
VALUES (null, ?, ?, ?, ?, ?, ?, ?)";


if(!$uppercase || !$lowercase || strlen($Losen) < 8) {
  $pw = 'ditt lösenord ska vara minst 8 tecken långt med stora och små bokstäver, tänkt dej att du gör en mening med ord som inte hör tillsammans ';
  echo json_encode($pw);
}else{
  $pw = 'Strong password.';
  echo json_encode($pw);
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("issssss", $Behorighet, $Anvnamn, MD5($Losen), $Enamn, $Fnamn, $Epost, $Telefon);
  $stmt->execute();
  
}


$sql = "INSERT INTO anvandare(AnvandarID,Behorighet,Anvnamn,Losen,Enamn,Fnamn,Epost,Telefon)
VALUES (null,'$Behorighet','$Anvnamn',MD5('$Losen'),'$Enamn','$Fnamn','$Epost','$Telefon')";

mysqli_close($conn);
}
else{
  $Error = "Fyll i alla fält";
echo json_encode($Error);

}
}else{
  $Error = "misslyckad verifiering"
  echo json_encode($Error);
  
}

}else{
  $Error = "Logga in";
  echo json_encode($Error);
}
}
?>