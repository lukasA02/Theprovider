<?php
require_once 'connect.php';
$username = $_POST['user'];
$password = $_POST['pass'];

$sql = "SELECT * FROM anvandare WHERE Anvnamn = ? && Losen = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);

if($stmt->execute()){
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
}

if($num_rows > 0){
    echo "Inloggad";
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