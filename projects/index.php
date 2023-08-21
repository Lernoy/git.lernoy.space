<?php
require($_SERVER["DOCUMENT_ROOT"] . "/templates/header.php");

$sql = "SELECT `CODE`, `NAME` FROM `section_pages` WHERE `SECTION_ID` = '".$sectionIdByCode."'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  echo "<a href='".$_SERVER["REQUEST_URI"]."" . $row["CODE"] . "/'>" . $row["NAME"] . "</a>";
}
