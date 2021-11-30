<?php

require_once 'conn.php';
require_once 'verifiera.php';

if(isset($_GET['aid']) && isset($_GET['hash'])){

  if(verifiera($_GET['hash'],$_GET['aid'])){

if(isset($_GET['anv']) && isset($_GET['losen'])) {
    $username = $_GET['anv'];
    $password = $_GET['losen'];
    $password = MD5($password);
}

if(isset($_GET['LosenTxt'])) {

    $NyttLosen = $_GET['LosenTxt'];
    $nylos = "nytt lösenord: " . $NyttLosen;
    echo json_encode($nylos);
    

}

$uppercase = preg_match('@[A-Z]@', $NyttLosen);
$lowercase = preg_match('@[a-z]@', $NyttLosen);


$sql = "UPDATE anvandare SET Losen = MD5('$NyttLosen') WHERE  anvandarid = 1";


if(!$uppercase || !$lowercase || strlen($NyttLosen) < 8) {
  $pw = 'Password should be at least 8 tecken in length and should include at least one upper case letter, one number character.';
  echo json_encode($pw);
}else{
  $pw = 'Strong password.';
  echo json_encode($pw);
  if (mysqli_query($conn, $sql)) {
  } else {
    $Error = "Fel: " . $sql . "<br>" . mysqli_error($conn);
    echo json_encode($Error)
  }
}

}else{
  $Error = "misslyckad verifiering";
  echo json_encode($Error);
}
}else{
  $Error = "Logga in";
  echo json_encode($Error);
}


