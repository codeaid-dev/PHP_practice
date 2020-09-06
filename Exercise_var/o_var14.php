<?php
$str = "こんにちは{name}、今日も{name}の笑顔が見れて嬉しいです。";
$name = "田中さん";
print str_replace('{name}', $name, $str);
?>
