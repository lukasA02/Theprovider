<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// UTF-8 🥰
mysqli_set_charset($conn, "utf8mb4");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>