
<?php
include 'conn.php';
include 'verifiera.php';

if(isset($_GET['anv']) && isset($_GET['hash'])){

    if(verifiera($_GET['hash'],$_GET['anv'])==TRUE ){

if (isset($_GET['submit'])){
    $date = $_GET['date'];

    $sql = "SELECT * FROM event WHERE Starttid BETWEEN '$date 00:00:00' AND '$date 23:59:00'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_array($result)) {
       // echo "Success!" . " <br> Namn: " . $row["Namn"] . "<br> Start: " . $row["Starttid"]. "<br> Slut: " . $row["Sluttid"]. "<br>";
       $dat = array("Namn"=>$row["Namn"], "Start"=>$row["Starttid"], "Slut"=>$row["Sluttid"] );
     echo json_encode($dat);
      } 
     
    mysqli_close($conn);
    
    }
}
    }else{
        echo "felmedelande2";
    }


}else{
    echo "felmedelande";
}

?>