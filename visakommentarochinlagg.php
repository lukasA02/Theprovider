<?php
require_once 'conn.php';

// Specifik användare inlägg
if(isset($_GET['aid'])) {
  $aid = $_GET['aid'];
  $sql = "SELECT BloggID FROM blogg WHERE AnvandarID = $aid";
  $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
      $bloggid = $row['BloggID'];
      }
    }
    else
      echo "0 resultat";
  if(isset($bloggid)) {
    echo "AAAAAAAAAAAAA";

  $sql = "SELECT MeddelandeID, BloggID, TaggID, Tidsstampel, Rubrik, Innehall
  FROM meddelande WHERE BloggID = $bloggid AND InlaggID IS NULL";

  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0) {
    $jelp = array();
    while($row = mysqli_fetch_assoc($result)) {
      array_push($jelp, array(
      "MeddelandeID"=>$row["MeddelandeID"], "BloggID"=>$row["BloggID"],
      "TaggID"=>$row["TaggID"], "Tidsstampel"=>$row["Tidsstampel"],
      "Rubrik"=>$row["Rubrik"], "Innehall"=>$row["Innehall"])
    );
  }

  echo json_encode($jelp);
}
// echo json_last_error_msg();
}
else
  echo "0 resultat";
}
// Alla inlägg
else {
$sql = "SELECT MeddelandeID, BloggID, TaggID, Tidsstampel, Rubrik, Innehall
FROM meddelande WHERE InlaggID IS NULL AND BloggID IS NOT NULL";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
  $qq = array();
  while($row = mysqli_fetch_assoc($result)) {
    array_push($qq, array(
    "MeddelandeID"=>$row["MeddelandeID"], "BloggID"=>$row["BloggID"],
    "TaggID"=>$row["TaggID"], "Tidsstampel"=>$row["Tidsstampel"],
    "Rubrik"=>$row["Rubrik"], "Innehall"=>$row["Innehall"])
    );
  }
  echo json_encode($qq);
  // echo json_last_error_msg();
}
else {
  echo "0 resultat";
}
}

// Specifikt inlägg kommentarer
if(isset($_GET['iid'])) {
$iid = $_GET['iid'];
$sql = "SELECT MeddelandeID, InlaggID, TaggID, Tidsstampel, Rubrik, Innehall
FROM meddelande WHERE InlaggID IS NOT NULL AND InlaggID = $iid";

$result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0) {
  $kommentarer = array();
    while($row = mysqli_fetch_assoc($result)) {
      array_push($kommentarer, array(
      "MeddelandeID"=>$row["MeddelandeID"], "InlaggID"=>$row["InlaggID"],
      "TaggID"=>$row["TaggID"], "Tidsstampel"=>$row["Tidsstampel"],
      "Rubrik"=>$row["Rubrik"], "Innehall"=>$row["Innehall"])
      );
    }
  echo json_encode($kommentarer);
  }
  else {
  echo "0 resultat";
  }
}
else {
// Alla kommentarer
$sql = "SELECT MeddelandeID, InlaggID, TaggID, Tidsstampel, Rubrik, Innehall
FROM meddelande WHERE InlaggID IS NOT NULL";
$result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0) {
    $kommentarer = array();
    while($row = mysqli_fetch_assoc($result)) {
      array_push($kommentarer, array(
      "MeddelandeID"=>$row["MeddelandeID"], "InlaggID"=>$row["InlaggID"],
      "TaggID"=>$row["TaggID"], "Tidsstampel"=>$row["Tidsstampel"],
      "Rubrik"=>$row["Rubrik"], "Innehall"=>$row["Innehall"])
      );
    }
    echo json_encode($kommentarer);
  }
  else {
  echo "0 resultat";
}
}
mysqli_close($conn);
?>