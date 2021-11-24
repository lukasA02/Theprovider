<?php

require_once "conn.php";
require_once 'verifiera.php';

if(isset($_GET['aid'], $_GET['hash'])) {
    if(verifiera($_GET['hash'], $_GET['aid'])) {
        if($behorighet == 1) {
            $sql="SELECT * FROM anvandare";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $anv = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($anv);

            } else {
                echo "Du är inte admin";
            }
    } else {
        echo "no";
    }
}

?>