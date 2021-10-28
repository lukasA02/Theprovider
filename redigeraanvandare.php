<?php

require_once "conn.php";
require_once "behorighet.php";
require_once 'verifiera.php';

echo $_GET['anvandarid'];
if(isset($_GET['anv']) && isset($_GET['hash'])){

  if(verifiera($_GET['hash'],$_GET['anv'])==TRUE ){

if(isset($_GET["Anvnamn"]) && isset($_GET["Enamn"]) && isset($_GET["Fnamn"]) && isset($_GET["Epost"]) && isset($_GET["Telefon"])){
    $anvandarid = $_GET['anvandarid'];
    $Anvnamn = $_GET['Anvnamn'];
    $Enamn = $_GET['Enamn'];
    $Fnamn = $_GET['Fnamn'];
    $Epost = $_GET['Epost'];
    $Telefon = $_GET['Telefon'];
}
else{
    header('Location: index.php');
}


if(isset($_GET["Anvnamn"]) && isset($_GET["Enamn"]) && isset($_GET["Fnamn"]) && isset($_GET["Epost"]) && isset($_GET["Telefon"])){
    $sql = "UPDATE anvandare SET Anvnamn = '$Anvnamn', Enamn ='$Enamn', Fnamn='$Fnamn', Epost='$Epost', Telefon='$Telefon' WHERE  anvandarid = $anvandarid";
}

if (mysqli_query($conn, $sql)) {
    echo " Anvandare uppdaterad";
  } else {
    echo " Fel: " . $sql . "<br>" . mysqli_error($conn);
  }
mysqli_close($conn);
  }else{echo "fuck you 2";
  }
}else{
  echo "fuck you";
}

?>