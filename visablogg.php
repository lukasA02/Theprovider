<?php
require_once "verifiera.php";

$sql = "SELECT AnvandarID, Beskrivning, Titel FROM blogg WHERE Rattigheter = 2";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$blogg = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($blogg);
?>