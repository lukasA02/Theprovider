<?php

require_once '../conn.php';
require_once '../verifiera.php';

if(isset($_GET['aid']) && isset($_GET['hash'])){

  if(verifiera($_GET['hash'],$_GET['aid'])){

if(isset($_GET['anv']) && isset($_GET['losen'])) {
    $username = $_GET['anv'];
    $password = $_GET['losen'];
    echo $password."<br>";
    $password = MD5($password);
    echo $password;
}

if(isset($_GET['LosenTxt'])) {

    $NyttLosen = $_GET['LosenTxt'];
    echo "nytt lösenord: " . $NyttLosen;
    

} else header('Location: aterstall.php');

$uppercase = preg_match('@[A-Z]@', $NyttLosen);
$lowercase = preg_match('@[a-z]@', $NyttLosen);


$sql = "UPDATE anvandare SET Losen = MD5('$NyttLosen') WHERE  anvandarid = 1";


if(!$uppercase || !$lowercase || strlen($NyttLosen) < 8) {
  echo 'Password should be at least 8 tecken in length and should include at least one upper case letter, one number character.';
}else{
  echo 'Strong password.';
  if (mysqli_query($conn, $sql)) {
  } else {
    echo "Fel: " . $sql . "<br>" . mysqli_error($conn);
  }
}

}else{
  echo " skriv in rätt aid/hash";
}
}else{
echo " logga in";
}


