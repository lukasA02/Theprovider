
<?php
include_once 'conn.php';
include_once 'verifiera.php';


if(isset($_GET['hash'], $_GET['aid'])) {

    if(verifiera($_GET['hash'], $_GET['aid'])) {

      if(isset($_GET['anvandarID'])){
          
        $VisarID = $_GET['anvandarID'];
    $sql = "SELECT Starttid, Sluttid, agare, namn FROM event WHERE Agare = $VisarID";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            //echo "<br> Ägare: " . $row["agare"]. "<br> Start: " . $row["starttid"]. "<br> Slut: " . $row["sluttid"]. "<br>";
            $visa = array("Eventnamn"=>$row["namn"],"Ägare"=>$row["agare"], "Start"=>$row["Starttid"], "Slut"=>$row["Sluttid"] );
     echo json_encode($visa);
        }
    } else {
        $resltat = "0 resltat";
        echo json_encode($resltat);
    }

}

}else{
    $Error = " skriv in rätt aid/hash";
    echo json_encode($Error);
  }
}else{
    $logga =" logga in";
    echo json_encode($logga);
    }

mysqli_close($conn);
?>
</body>
</html>

