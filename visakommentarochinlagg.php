<?php
require_once 'conn.php';
require_once 'verifiera.php';

if(isset($_GET['aid'], $_GET['hash'])) {
// Specifik användare inlägg
if(isset($_GET['anvandarid'])) {
  $anvandarid = $_GET['anvandarid'];
  $sql = "SELECT BloggID FROM blogg WHERE AnvandarID = $anvandarid";
  $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
      $bloggid = $row['BloggID'];
      }
    }
    else
    $resltat = "0 resltat";
    echo json_encode($resltat);
  if(isset($bloggid)) {
    // echo "AAAAAAAAAAAAA";

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
$resltat = "0 resltat";
echo json_encode($resltat);
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
  $resltat = "0 resltat";
  echo json_encode($resltat);
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
    $resltat = "0 resltat";
    echo json_encode($resltat);
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
    $resltat = "0 resltat";
    echo json_encode($resltat);
}
}
mysqli_close($conn);
}
?>