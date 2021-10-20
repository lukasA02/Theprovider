<?php
// anslut
require_once 'conn.php';

if(isset($_GET['anv']) && isset($_GET['losen'])) {
    $username = $_GET['anv'];
    $password = $_GET['losen'];
    $password = MD5($password);
}

$sql = "SELECT AnvandarID, Behorighet, Anvnamn, Losen FROM anvandare WHERE Anvnamn = '$username' && Losen = '$password'";
$result = mysqli_query($conn, $sql);

$hash = mt_rand(100000000, 999999999);
$tid = new DateTime('now');
date_default_timezone_set("Europe/Stockholm");
$tid = date('Y-m-d H:i:s');


if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $anvandarid = $row["AnvandarID"];
        $behorighet = $row["Behorighet"];
        // echo $anvandarid;
    }
    
    $sql = "UPDATE anvandare SET Hashkey = $hash, Inloggtid = '$tid' WHERE AnvandarID = $anvandarid";
    if(mysqli_query($conn, $sql)){
        echo json_encode(Array("aid"=>$anvandarid, "hash"=>$hash));
    } else {
        echo $sql . mysqli_error($conn);
    }
    


}

if(isset($_GET['anv']) && isset($_GET['hash'])) {
    $username = $_GET['anv'];
    $hash = $_GET['hash'];
}

$sql = "SELECT AnvandarID, Behorighet, Anvnamn, Hashkey, Inloggtid FROM anvandare WHERE 
Anvnamn = '$username' && Hashkey = '$hash' && Inloggtid > DATE_SUB(now(), INTERVAL 10 MINUTE)";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $anvandarid = $row["AnvandarID"];
        $behorighet = $row["Behorighet"];
        // $nutid = $row["Inloggtid"];
        // strtotime($nutid);
        // echo $anvandarid;
    }
}

//     switch ($behorighet) {
//         // om admin
//         case 1:
//             echo "Admin";

//         // om moderator
//         case 2:
//             echo "Moderator";

//         // om användare
//         case 3:
//             echo "Användare";
        
//         default:
//             # code...
//     }
// } else {
//     echo "noll resultat";
// }

// om allt går fel ta bort // på nästa rad 💀💀💀
// mysqli_close($conn);

// $stmt = $conn->prepare($sql);
// $stmt->bind_param("ss", $username, $password);

// if ($stmt->execute()) {
//     $result = $stmt->get_result();
//     $num_rows = $result->num_rows;

//     // användarid och behörighet
//     while ($row = $result->fetch_array())
//     {
//         $anvandarid = $row['AnvandarID'];
//         $behorighet = $row['Behorighet'];
//         // echo $behorighet;
//     }
// }

// if ($num_rows > 0) {
//     // echo "Inloggad";
//     // ???????????
//     switch ($behorighet) {
//         // om användare
//         case 1:
//             echo "Användare";
//             break;

//         // om moderator
//         case 2:
//             echo "Moderator";
//             break;

//         // om admin
//         case 3:
//             echo "Admin";
//             break;
        
//         default:
//             # code...
//             break;
//     }
// } else {
//     // echo "Inte inloggad";
// }

// hur man skriver kod
// require_once 'behorighet.php';
// if($behorighet == 1) (användare)
//     gör saker som användare får göra

// hur man loggar in
// http://localhost:8080/mapp/skr%C3%A4p/fuck/behorighet.php?anv=VadSomHelst&losen=123vetefan

?>