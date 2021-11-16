
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Anvandare!</title>
</head>
<body>
<?php

require_once "conn.php";
require_once 'verifiera.php';

if(isset($_GET['aid'], $_GET['hash'])) {
    if(verifiera($_GET['hash'], $_GET['aid'])) {
        if($behorighet == 1) {
            $sql="SELECT * FROM anvandare";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                    while($row = mysqli_fetch_assoc($result)) {

                        $visa = array("ID"=>$row["AnvandarID"], "Behörighet"=>$row["Behorighet"], 
                        "Användarnamn"=>$row["Anvnamn"],"Lösenord"=>$row["Losen"],"Efternamn"=>$row["Enamn"],
                        "Förnamn"=>$row["Fnamn"],"Epostadress"=>$row["Epost"],"Telefonnummer"=>$row["Telefon"] );

                    echo json_encode($visa);
                    }

                } else {
                    echo "0 results";
                }

            } else {
                echo "Du är inte admin";
            }
    } else {
        echo "no";
    }
}

?>
</body>
</html>