<?php
//$comment = $_POST["comment"];
// XSS対策
$comment = htmlspecialchars($_POST["comment"], ENT_QUOTES, "UTF-8");
print($comment);
