<?php
include($_SERVER["DOCUMENT_ROOT"]."/templates/sql.php");

$sql = "SELECT CODE, DESCRIPTION, ID, NAME, TITLE, CONTENT FROM section_pages WHERE CODE='".explode("/", $_SERVER["REQUEST_URI"])[2]."' AND SECTION_ID='".$sectionIdByCode."'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["CONTENT"];
  }
} else {
    http_response_code(404);
}

?>