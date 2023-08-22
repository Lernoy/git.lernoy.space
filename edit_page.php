<?php
require($_SERVER["DOCUMENT_ROOT"] . "/templates/sql.php");
if (!$_REQUEST["ID"]) {
    $sql = "SELECT `ID`, `NAME` FROM `section_pages`";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<a href='" . $_SERVER["REQUEST_URI"] . "?ID=" . $row["ID"] . "/'>" . $row["NAME"] . "</a>";
    }
} else {
    $sql = "SELECT * FROM `section_pages` WHERE ID = '" . $_REQUEST["ID"] . "'";
    $result = $conn->query($sql);

    $arForm = $result->fetch_assoc();
} ?>
<form method="POST">
    
    <? foreach ($arForm as $key => $input) {
        if ($key == "CONTENT") { ?>
            <textarea class="text"></textarea>
        <? } else { ?>
            <input type="text" name="<?=$key?>" placeholder="<?= $input ?>">
        <? } ?>
    <? } ?>
    <input type="submit">
</form>




<link rel="stylesheet" href="/css/codemirror.css">
<script src="/js/jquery-3.7.0.min.js"></script>
<script src="/js/codemirror.js"></script>
<script type="text/javascript" src="/js/codemirror/mode/javascript/javascript.js"></script>
<script type="text/javascript" src="/js/codemirror/mode/css/css.js"></script>
<script type="text/javascript" src="/js/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script type="text/javascript" src="/js/codemirror/mode/xml/xml.js"></script>

<script>
    var myCodeMirror = CodeMirror.fromTextArea($("textarea.text")[0], {
        lineNumbers: true,
        value: "<p>Hello</p>",
        extraKeys: {
            "Ctrl": "autocomplete"
        },
        mode: "htmlmixed",
        indentUnit: 2,
        lineWrapping: true,
        foldGutter: true,
        indentWithTabs: true
    });
</script>