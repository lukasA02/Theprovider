<?php

require_once "conn.php";

if(isset($_GET["Behorighet"]) && isset($_GET["Anvnamn"]) && isset($_GET["Losen"]) && isset($_GET["Enamn"]) && isset($_GET["Fnamn"]) && isset($_GET["Epost"]) && isset($_GET["Telefon"])){
    $Behorighet = $_GET["Behorighet"];
    $Anvnamn = $_GET["Anvnamn"];
    $Losen = $_GET["Losen"];
    $Enamn = $_GET["Enamn"];
    $Fnamn = $_GET["Fnamn"];
    $Epost = $_GET["Epost"];
    $Telefon = $_GET["Telefon"];
}

$sql = "INSERT INTO anvandare(AnvandarID,Behorighet,Anvnamn,Losen,Enamn,Fnamn,Epost,Telefon) 
VALUES (null,'$Behorighet','$Anvnamn','$Losen','$Enamn','$Fnamn','$Epost','$Telefon')";

if (mysqli_query($conn, $sql)) {
  echo "Konto skapat";
} else {
  echo "Fel: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

// $stmt = $conn->prepare($sql);
// $stmt->bind_param("issssss", $Behorighet, $Anvnamn, $Losen, $Enamn, $Fnamn, $Epost, $Telefon);

// $stmt->execute();
// $stmt->close();
?>