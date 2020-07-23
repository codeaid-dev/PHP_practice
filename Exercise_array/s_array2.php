<?php
$nums = [2,6,1,7,3,9,8,5,4,0];
print "キーは？";
$key = trim(fgets(STDIN));

if ($key < 0 || $key > 9) {
  print "範囲外です\n";
} else {
  print "値：" . $nums[$key] . "\n";
}
?>
