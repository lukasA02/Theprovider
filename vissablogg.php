<?php
require_once 'behorighet.php';
require_once "conn.php";

    if(isset($_GET['BloggID'])){
    $bloggid = $_GET['BloggID'];


    $sql= "SELECT Titel, Beskrivning, AnvandarID FROM blogg WHERE BloggID=$bloggid";
    $result = mysqli_query($conn,$sql);
    if (mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_array($result)) {
       $dat = array("Blogg titel"=>$row["Titel"], "Beskrivning"=>$row["Beskrivning"], "skapparen av bloggen"=>$row["AnvandarID"]);
     echo json_encode($dat);
      }
    }

    $sql= "SELECT InlaggID, Rubrik, Innehall FROM meddelande WHERE BloggID=$bloggid";
    $result = mysqli_query($conn,$sql);
    if (mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_array($result)) {
       $dat = array("Inläggets ID"=>$row["InlaggID"], "Rubrik"=>$row["Rubrik"], "Innehåll"=>$row["Innehall"]);
     echo json_encode($dat);
      }
    } 



}
















?>