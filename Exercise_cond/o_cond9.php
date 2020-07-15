<?php
print "入力：";
$str = trim(fgets(STDIN));
$a = "";
$b = "";
for ($i = 0; $i < strlen($str); $i++) {
  $w = substr($str, $i, 1);
  if ($w == "A") {
    $a .= $w;
  } else if ($w == "B") {
    $b .= $w;
  }
}
print "結果表示：" . $a . $b . "\n";
?>
