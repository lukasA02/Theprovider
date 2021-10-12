<?php
  $conn = new mysqli('localhost', 'root', '', 'TP');
  if($conn->connect_error){
    die("Dödligt fel: kan inte ansluta till databasen: ". $conn->connect_error);
  }
?>