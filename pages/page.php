<?php
include($_SERVER["DOCUMENT_ROOT"]."/templates/sql.php");

$sql = "SELECT CODE, DESCRIPTION, ID, NAME, TITLE, CONTENT FROM pages WHERE CODE='".explode("/", $_SERVER["REQUEST_URI"])[2]."'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: ";
  }
} else {
    http_response_code(404);
}

?>