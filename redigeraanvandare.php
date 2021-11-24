<?php

require_once "conn.php";
require_once 'verifiera.php';

//echo $_GET['anvandarid'];
if(isset($_GET['aid']) && isset($_GET['hash'])){

  if(verifiera($_GET['hash'],$_GET['aid'])){

    if (isset ($_GET["anvandarid"], $_GET["Anvnamn"], $_GET["Enamn"], $_GET["Fnamn"], $_GET["Epost"], $_GET["Telefon"])){
      $anvandarid = $_GET['anvandarid'];
      $Anvnamn = $_GET['Anvnamn'];
      $Enamn = $_GET['Enamn'];
      $Fnamn = $_GET['Fnamn'];
      $Epost = $_GET['Epost'];
      $Telefon = $_GET['Telefon'];
     
    
    
    $sql = "UPDATE anvandare SET ";
      if(isset ($Anvnamn))
      $sql = $sql . "Anvnamn = '$Anvnamn',";
      if(isset ($Enamn))
      $sql = $sql . "Enamn = '$Enamn',";
      if(isset ($Fnamn))
      $sql = $sql . "Fnamn = '$Fnamn',";
      if(isset ($Epost))
      $sql = $sql . "Epost = '$Epost',";
      if(isset ($Telefon))
      $sql = $sql . "Telefon = '$Telefon',";
      if(isset ($locked))
      $sql = $sql . "locked = '$locked',";
      $len = strlen($sql);
      $sql[$len-1] = " ";
      $sql = $sql."WHERE AnvandarID = $anvandarid";

   
    
    if (mysqli_query($conn, $sql)) {
      $output = "användare uppdaterad"; 
      echo json_encode($output);
        
      } else {
        $output =  " Fel: " . $sql . "<br>" . mysqli_error($conn);
        echo json_encode($output); 
      }
    mysqli_close($conn);
}
else{
   $output = "wrong input, see documentation"; 
   echo json_encode($output);
}


  } else{
    $output = "wrong aid/hash";
    echo json_encode($output);
    
  }
} else{
  $output = "fel"; 
  echo json_encode($output);
}

?>