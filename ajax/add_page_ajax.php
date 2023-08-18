<?php require($_SERVER["DOCUMENT_ROOT"] . "/templates/sql.php"); ?>

<?php
if(!$conn->query("INSERT INTO `section_pages`(`SECTION_ID`, `NAME`, `CODE`, `TITLE`, `DESCRIPTION`, `CONTENT`, `IMAGE`) VALUES ('".$_POST["SECTION_ID"]."','".$_POST["NAME"]."','".$_POST["CODE"]."','".$_POST["TITLE"]."','".$_POST["DESCRIPTION"]."','".$_POST["CONTENT"]."','".$_POST["IMAGE"]."')")){
    echo("Error description: " . $conn -> error);
}
?>