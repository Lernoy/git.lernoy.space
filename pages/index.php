<?php
require($_SERVER["DOCUMENT_ROOT"]."/templates/header.php");
$sql = "SELECT CODE, NAME FROM pages";
$result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    echo "<a href='/pages/".$row["CODE"]."/'>".$row["NAME"]."</a>";
  }
?>