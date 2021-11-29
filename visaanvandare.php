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
                $admin = "Du är inte admin";
                echo json_encode($admin);
            }
    } else {
        echo json_encode("Error fel inlogg");
    }
}

?>