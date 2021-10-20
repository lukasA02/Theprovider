<?php
require_once "conn.php";

function verifiera ($key,$aid){
$sql = "SELECT * from anvandare where anvandare.key = '$key' and anvandare.anvandarid = $aid";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 1)
    return true;
    else {
        return false;
    }
// Kolla datumstämpel och uppdatera den

}

/********************************************************************** */
// Så här kommer varje phpfil se ut typ.
if(verifiera($_GET['key'],$_GET['user'])){
//gör det ni skall 
} else {
//denna anvndare är inte verifierad.
}
?>