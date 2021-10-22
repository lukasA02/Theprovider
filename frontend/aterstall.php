<?php

require_once '../conn.php';

if(isset($_GET['anv']) && isset($_GET['losen'])) {
    $username = $_GET['anv'];
    $password = $_GET['losen'];
    echo $password."<br>";
    $password = MD5($password);
    echo $password;
}

$sql = "SELECT AnvandarID FROM anvandare WHERE Anvnamn = '$username' && Losen = '$password'";
$result = mysqli_query($conn, $sql);

echo "ditt id: " . $result -> num_rows;
$DittId = $result -> num_rows;

?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <title>Ändra ditt lösenord</title>
</head>
<body>
    <div class="asd">

   <p> Ange ditt ID </p>
</div>
    </form>
    <div class="color">
    <div>
    <header class="top"></header>
    </div>

    <br>
    
<form action="aterstallt.php" method="GET">
    <input type="number" name="DittID" value="<?php echo $DittId?>">
    Ange ditt nya lösenord
    <input type="text" name="LosenTxt">
    <input type="submit" value="submit">
</form>
</body>

 

<script src="theprovider.js"></script>
</html>

