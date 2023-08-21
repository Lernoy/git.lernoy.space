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
    while ($row = $result->fetch_assoc()) {
        print_r($row);
    }
} ?>
<div class="text"></div>
<link rel="stylesheet" href="/css/codemirror.css">
<script src="/js/jquery-3.7.0.min.js"></script>
<script src="/js/codemirror.js"></script>

<script>
    var myCodeMirror = CodeMirror($("div.text")[0], {
        value: "function myScript(){return 100;}\n",
        mode: "javascript",
        theme: "yonce",
        lineNumbers: true,
        matchBrackets: true,
        lineWrapping: true,
        cursorHeight: 0,
        styleActiveLine: true,
    });
</script>