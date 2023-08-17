<?php require($_SERVER["DOCUMENT_ROOT"] . "/templates/sql.php"); ?>

<form action="">
    <?php

    $arrFields = [];
    $sql = "SHOW FULL COLUMNS FROM `sections`";
    $result = $conn->query($sql);
    $arrSectionsId = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arrFields[$row["Field"]]["FIELD_NAME"] = $row["Field"];
            $arrFields[$row["Field"]]["FIELD_COMMENT"] = $row["Comment"];
        }
    }

    foreach ($arrFields as $field) { ?>
        <input type="text" name="<?= $field["FIELD_NAME"] ?>" placeholder="<?= $field["FIELD_COMMENT"] ?>">
    <?php }
    ?>
</form>