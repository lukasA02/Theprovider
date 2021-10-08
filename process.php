<?php 

include 'conn.php';
if(isset ($_POST['submit']))
{
    $namn = $_POST['namn'];
    $agare = $_POST['agare'];
    $start = $_POST['starttid'];
    $slut = $_POST['sluttid'];

    $sql="INSERT INTO event (namn, agare, starttid, sluttid)
    VALUES ('$namn', '$agare', '$start', '$slut')";

    if (mysqli_query($conn, $sql)) {
        echo "Nytt event lagrat";
    } else {
        echo "Error: " .$sql . "
        " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>