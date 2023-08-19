<?php
$sql = "SELECT * FROM `sections`";
$result = $conn->query($sql);
$arrSectionsFullInfo = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arrSectionsFullInfo[$row["CODE"]]["ID"] = $row["ID"];
        $arrSectionsFullInfo[$row["CODE"]]["NAME"] = $row["NAME"];
        $arrSectionsFullInfo[$row["CODE"]]["CODE"] = $row["CODE"];
    }
}
$sectionIdByCode = $arrSectionsFullInfo[explode("/", $_SERVER['REQUEST_URI'])[1]]["ID"];