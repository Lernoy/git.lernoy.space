<?php
include($_SERVER["DOCUMENT_ROOT"] . "/templates/sql.php");



$sql = "SHOW TABLES";
$result = $conn->query($sql);
$section = explode("/", $_SERVER['REQUEST_URI'])[1];
$arrPageCodes = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $arrPageCodes[] = $row["Tables_in_j6531130_cms"];
  }
}


if ($_SERVER["REQUEST_URI"] == "/") require($_SERVER["DOCUMENT_ROOT"] . "/index.php");

if (in_array($section, $arrPageCodes) && file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . $section . "/")) {
  if ($_SERVER["REQUEST_URI"] != "/" . $section . "/")
    include($_SERVER['DOCUMENT_ROOT'] . "/" . $section . "/page.php");
  else
    include($_SERVER['DOCUMENT_ROOT'] . "/" . $section . "/index.php");
} 
else if(explode(".", $_SERVER["REQUEST_URI"])[1] == "php"){
  include($_SERVER['DOCUMENT_ROOT'] . $_SERVER["REQUEST_URI"]);
}
else {
  http_response_code(404);
  include('404.php'); // provide your own HTML for the error page
  die();
}
