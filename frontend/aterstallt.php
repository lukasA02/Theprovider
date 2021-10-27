<?php

require_once '../conn.php';

if(isset($_GET['anv']) && isset($_GET['losen'])) {
    $username = $_GET['anv'];
    $password = $_GET['losen'];
    echo $password."<br>";
    $password = MD5($password);
    echo $password;
}
else
    echo "Logga in";

if(isset($_GET['LosenTxt'])) {

    $NyttLosen = $_GET['LosenTxt'];
    echo "nytt lösenord: " . $NyttLosen;
    

} else 
  header('Location: aterstall.php');

$uppercase = preg_match('@[A-Z]@', $NyttLosen);
$lowercase = preg_match('@[a-z]@', $NyttLosen);
$number    = preg_match('@[0-9]@', $NyttLosen);

$sql = "UPDATE anvandare SET Losen = MD5('$NyttLosen') WHERE  anvandarid = 1";


if(!$uppercase || !$lowercase || !$number || strlen($NyttLosen) < 8) {
  echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number character.';
}else{
  echo 'Strong password.';
  if (mysqli_query($conn, $sql)) {
  } else {
    echo "Fel: " . $sql . "<br>" . mysqli_error($conn);
  }
}


?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <title>Ditt lösenord är ändrat</title>
</head>
<body>

<script src="theprovider.js"></script>
</html>

