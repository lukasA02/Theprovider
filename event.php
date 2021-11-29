
<?php
require_once 'conn.php';
require_once 'verifiera.php';

if(isset($_GET['hash'], $_GET['aid'])) {
  if(verifiera($_GET['hash'], $_GET['aid'])) {
    if(isset($_GET['tabort'])){
        $evid = $_GET['evid'];
        $sql = "DELETE FROM event WHERE EventID= $evid";

        if (mysqli_query($conn, $sql)) {
            echo " Event uppdaterat";
          } else {
            $Error = " Fel: " . $sql . "<br>" . mysqli_error($conn);
            echo json_encode($Error);
          }
        mysqli_close($conn);
        }

    if(isset($_GET['submit'])){
        $evid = $_GET['evid'];
        $namn = $_GET['namn'];
        $beskrivning = $_GET["beskrivning"];
        $sttid = $_GET['starttid'];
        $sltid = $_GET['sluttid'];

        if(isset($_GET['namn']) && isset($_GET['starttid']) && isset($_GET['sluttid'])){
            $sql = "UPDATE event SET Namn = '$namn', beskrivning = '$beskrivning' Starttid ='$sttid', Sluttid='$sltid' WHERE EventID = $evid";
        }

    if (mysqli_query($conn, $sql)) {
        echo " Event uppdaterat";
      } else {
        $Error =  " Fel: " . $sql . "<br>" . mysqli_error($conn);
        echo json_encode($Error);
      }
    mysqli_close($conn);
    }
  }else{
    $Error = "misslyckad verifiering"
    echo json_encode($Error);
  }
}else{
  $Error = "Logga in";
echo json_encode($Error);
}
?>