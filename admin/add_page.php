<?php require($_SERVER["DOCUMENT_ROOT"] . "/templates/sql.php"); ?>
<?php 
    $arrFields = [];
    $sectionId;

    $result = $conn->query("SHOW FULL COLUMNS FROM `section_pages`");
    $arrSectionsId = [];
    
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
        <?php $ifId = $field["FIELD_NAME"]=="ID"?"value='".($sectionId+1)."'":"";?>
        <input type="text" name="<?= $field["FIELD_NAME"] ?>" placeholder="<?= $field["FIELD_COMMENT"]?>" <?=$ifId?>>
    <?php }?>
    <input type="submit" value="Добавить">
</form>




<?php require($_SERVER["DOCUMENT_ROOT"] . "/templates/js_files.php"); ?>