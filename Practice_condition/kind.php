<?php
print "入力：";
$str = trim(fgets(STDIN));
$count = 0;
while (strlen($str) > 0) {
  $w = substr($str, 0, 1);
  $count++;
  $str = str_replace($w, "", $str);
}
print "種類数：" . $count . "\n";
?>
