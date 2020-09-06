<?php
$str = "「       」の半角空白を削除<br>";
$str = str_replace(" ", "", $str);
print $str;
$str = "「　　　　」の全角空白を削除<br>";
$str = str_replace("　", "", $str);
print $str;
?>
