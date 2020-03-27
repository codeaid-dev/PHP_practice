<?php
//$comment = $_GET["comment"];
// XSS対策
$comment = htmlspecialchars($_GET["comment"], ENT_QUOTES, "UTF-8");
print($comment);
