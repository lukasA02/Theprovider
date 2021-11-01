<?php

require_once "../conn.php";
require_once "../behorighet.php";

echo $anvandarid;
$sql = "SELECT Anvnamn, Enamn, Fnamn, Epost, Telefon FROM anvandare Where anvandarid='$anvandarid'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  if($row = mysqli_fetch_assoc($result)) {
    $Anvnamn = $row["Anvnamn"];
    $Enamn = $row["Enamn"];
    $Fnamn = $row["Fnamn"];
    $Epost = $row["Epost"];
    $Telefon = $row["Telefon"];
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="redigeraanvandare.php" method="GET">
    <input type="hidden" name="anvandarid" value="<?php echo $anvandarid; ?>">
    <input type="text" placeholder="Anvandarnamn" name="Anvnamn" value="<?php print $Anvnamn; ?>">
    <input type="text" placeholder="Efternamn" name="Enamn" value="<?php print $Enamn; ?>">
    <input type="text" placeholder="Fornamn" name="Fnamn" value="<?php print $Fnamn; ?>">
    <input type="text" placeholder="Epost" name="Epost" value="<?php print $Epost; ?>">
    <input type="text" placeholder="Telefon" name="Telefon" value="<?php print $Telefon; ?>">
    <input type="submit" value="submit">
</form>
</body>
</html>


