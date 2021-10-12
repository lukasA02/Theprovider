<?php
  $conn = new mysqli('localhost', 'root', '', 'TP');
  if($conn->connect_error){
    die("Dödligt fel: det går inte ansluta till databasen: ". $conn->connect_error);
  }
?>