<?php require($_SERVER["DOCUMENT_ROOT"] . "/templates/sql.php"); ?>
<?php
$arrFields = [];
$arrSectionInfo = [];
$sectionId;

$result = $conn->query("SHOW FULL COLUMNS FROM `section_pages`");
while ($row = $result->fetch_assoc()) {
    $arrFields[$row["Field"]]["FIELD_NAME"] = $row["Field"];
    $arrFields[$row["Field"]]["FIELD_COMMENT"] = $row["Comment"];
}

$result = $conn->query("SELECT MAX(`ID`) FROM `section_pages`");
$sectionId = array_values($result->fetch_assoc())[0];

?>

<form method="POST" id="create_page">
    <?php
    foreach ($arrFields as $field) { ?>
        <?php $ifId = $field["FIELD_NAME"] == "ID" ? "value='" . ($sectionId + 1) . "' disabled" : ""; ?>
        <?php if ($field["FIELD_NAME"] == "SECTION_ID") { ?>
            <select name="SECTION_ID">
                <?php foreach ($arrSectionsFullInfo as $sectionInfo) { ?>
                    <option value="<?= $sectionInfo["ID"] ?>">Раздел - <?= $sectionInfo["NAME"] ?>(<?= $sectionInfo["CODE"] ?>)</option>
                <?php } ?>
            </select>
        <?php } else { ?>
            <input type="text" name="<?= $field["FIELD_NAME"] ?>" placeholder="<?= $field["FIELD_COMMENT"] ?>" <?= $ifId ?>>
        <?php } ?>
    <?php } ?>
    <input type="submit" value="Добавить">
</form>



<?php require($_SERVER["DOCUMENT_ROOT"] . "/templates/js_files.php"); ?>