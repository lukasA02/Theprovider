<?php
session_start();
require_once 'anslut.php';

$username = $_POST['user'];
$password = $_POST['pass'];

$sql = "SELECT * FROM anvandare WHERE Anvnamn = ? && Losen = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
}

if ($num_rows > 0) {
    $_SESSION['inloggad'] = true;
    header("location:index.php");
} else {
    echo "Inte inloggad";
}

// kod
// switch ($behorighet) {
//     case 1:
//         echo 'Användare';
//         break;
//     case 2:
//         echo 'Moderator';
//         break;
//     case 3:
//         echo 'Administratör';
//         break;

//     default:
//         # code...
//         break;
// }
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if(isset($_SESSION["inloggad"]) && $_SESSION["inloggad"]) {
        echo "Inloggad";
        echo '<form action="boka.php" method="post"><label>Starttid:</label><input name="starttid" type="datetime-local">
        <label>Sluttid:</label><input name="sluttid" type="datetime-local"><input value="Skapa" type="submit"></form>';
    }
    ?>
</body>

</html>