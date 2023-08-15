<?php 
include($_SERVER["DOCUMENT_ROOT"]."/templates/sql.php");



$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if (str_contains($_SERVER["REQUEST_URI"], $row["Tables_in_j6531130_cms"]) !== false) {
        if ($_SERVER["REQUEST_URI"] != "/".$row["Tables_in_j6531130_cms"]."/")
            include($_SERVER['DOCUMENT_ROOT'] . "/".$row["Tables_in_j6531130_cms"]."/page.php");
        else
            include($_SERVER['DOCUMENT_ROOT'] . "/".$row["Tables_in_j6531130_cms"]."/index.php");
    }
  }
}
if($_SERVER["REQUEST_URI"]=="/") require($_SERVER["DOCUMENT_ROOT"]."/index.php");


function pageCheck($pageCode){
    if (str_contains($_SERVER["REQUEST_URI"], $pageCode) !== false) {
        if ($_SERVER["REQUEST_URI"] != "/".$pageCode."/")
            include($_SERVER['DOCUMENT_ROOT'] . "/".$pageCode."/page.php");
        else
            include($_SERVER['DOCUMENT_ROOT'] . "/".$pageCode."/index.php");
    }
}te
?>