<?php
// anslut
require_once 'conn.php';
session_start();

if(isset($_GET['anv']) && isset($_GET['losen'])) {
    $username = $_GET['anv'];
    $password = $_GET['losen'];
    $password = MD5($password);
}

$sql = "SELECT AnvandarID, Behorighet, Anvnamn, Losen FROM anvandare WHERE Anvnamn = '$username' && Losen = '$password' && locked IS NULL";
$result = mysqli_query($conn, $sql);

// $hash = mt_rand(100000000, 999999999);
$hash = 123456789;
$tid = new DateTime('now');
date_default_timezone_set("Europe/Stockholm");
$tid = date('Y-m-d H:i:s');

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $anvandarid = $row["AnvandarID"];
        $behorighet = $row["Behorighet"];
        // echo $anvandarid;
    }

    $sql = "SELECT Hashkey, Inloggtid FROM anvandare WHERE
    AnvandarID = $anvandarid && Inloggtid < DATE_SUB(now(), INTERVAL 15 MINUTE)";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $sql = "UPDATE anvandare SET Hashkey = $hash, Inloggtid = '$tid' WHERE AnvandarID = $anvandarid";
        $result = mysqli_query($conn, $sql);
    }

    // if(mysqli_query($conn, $sql)){
    //     //echo json_encode(Array("aid"=>$anvandarid, "hash"=>$hash));
    //     // $_SESSION['mm'] = json_encode(Array("aid"=>$anvandarid, "hash"=>$hash));
    //     //echo json_last_error();
    // } else {
    //     echo $sql . mysqli_error($conn);
    // }
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

// hur man skriver kod
// require_once 'behorighet.php';
// if($behorighet == 1)
//     gör saker som användare får göra

// hur man loggar in
// http://localhost:8080/mapp/skr%C3%A4p/fuck/behorighet.php?anv=VadSomHelst&losen=123vetefan

?>