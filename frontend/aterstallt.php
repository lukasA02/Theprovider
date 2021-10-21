<?php

require_once '../conn.php';

if(isset($_GET['anv']) && isset($_GET['losen'])) {
    $username = $_GET['anv'];
    $password = $_GET['losen'];
    echo $password."<br>";
    $password = MD5($password);
    echo $password;
}

$sql = "SELECT AnvandarID FROM anvandare WHERE Anvnamn = '$username'  && Losen = '$password'";
$result = mysqli_query($conn, $sql);

echo "ditt id: " . $result -> num_rows;
$DittId = $result -> num_rows;

if(isset($_GET['LosenTxt'])) {

    $NyttLosen = $_GET['LosenTxt'];
    echo "nytt lösenord: " . $NyttLosen;
    $Md5NyttLosen = md5($NyttLosen);

} else header('Location: aterstall.php');

$sql = "UPDATE anvandare SET Losen = '$Md5NyttLosen' WHERE  anvandarid = $DittId";

if (mysqli_query($conn, $sql)) {
    echo " Anvandare uppdaterad";
  } else {
    echo " Fel: " . $sql . "<br>" . mysqli_error($conn);
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

<?php mysqli_close();
?>
<script src="theprovider.js"></script>
</html>

