<?php
$str = "";
while (strlen($str) < 10) {
  print "半角英数字入力：";
  $str .= trim(fgets(STDIN));
}
$str = substr($str, 0, 10);
print "入力文字：" . $str . "\n";
?>
