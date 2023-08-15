<?php 
include($_SERVER["DOCUMENT_ROOT"]."/templates/sql.php");



$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    pageCheck($row["Tables_in_j6531130_cms"]);
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
}
?>