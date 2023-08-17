<?php
require($_SERVER["DOCUMENT_ROOT"] . "/templates/header.php");

$sql = "SELECT `CODE`, `NAME` FROM `section_pages` WHERE `SECTION_ID` = '".$sectionID."'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  echo "<a href='/first/" . $row["CODE"] . "/'>" . $row["NAME"] . "</a>";
}
