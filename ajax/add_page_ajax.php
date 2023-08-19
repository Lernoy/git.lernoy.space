<?php require($_SERVER["DOCUMENT_ROOT"] . "/templates/sql.php"); ?>

<?php
$conn->query("INSERT INTO `section_pages`(`SECTION_ID`, `NAME`, `CODE`, `TITLE`, `DESCRIPTION`, `CONTENT`, `IMAGE`) VALUES ('".$_POST["SECTION_ID"]."','".$_POST["NAME"]."','".$_POST["CODE"]."','".$_POST["TITLE"]."','".$_POST["DESCRIPTION"]."','".$_POST["CONTENT"]."','".$_POST["IMAGE"]."')");

$result = $conn->query("SELECT MAX(`ID`) FROM `section_pages`");
echo array_values($result->fetch_assoc())[0]+1;

?>