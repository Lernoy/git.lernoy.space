<?php
$sql = "SELECT * FROM `sections`";
$result = $conn->query($sql);
$arrSectionsId = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arrSectionsId[$row["CODE"]]["ID"] = $row["ID"];
        $arrSectionsId[$row["CODE"]]["CODE"] = $row["CODE"];
    }
}
$sectionID = $arrSectionsId[explode("/", $_SERVER['REQUEST_URI'])[1]]["ID"];