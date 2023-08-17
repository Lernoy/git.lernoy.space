<?php
include($_SERVER["DOCUMENT_ROOT"] . "/templates/sql.php");
$sql = "SELECT * FROM `sections`";
$result = $conn->query($sql);
$section = explode("/", $_SERVER['REQUEST_URI'])[1];
$arrPageCodes = [];
$pathUrl = $_SERVER["REQUEST_URI"];
$pathRoot = $_SERVER['DOCUMENT_ROOT'];



if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $arrPageCodes[] = $row["CODE"];
  }
}


if ($pathUrl == "/") require($_SERVER["DOCUMENT_ROOT"] . "/index.php");

if (in_array($section, $arrPageCodes) && file_exists($pathRoot  . "/" . $section . "/")) {
  if ($pathUrl != "/" . $section . "/")
    include($pathRoot  . "/" . $section . "/page.php");
  else
    include($pathRoot  . "/" . $section . "/index.php");
} else if (explode(".", $pathUrl)[1] == "php") {
  include($pathRoot  . $pathUrl);
} else {
  http_response_code(404);
  include('404.php'); // provide your own HTML for the error page
  die();
}
