<?php
print "入力：";
$str = trim(fgets(STDIN));
$reverse = "";
for ($i = strlen($str)-1; $i > -1; $i--) {
  $reverse .= substr($str, $i, 1);
}
print "結果表示：" . $reverse . "\n";
?>
