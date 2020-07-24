<?php
for ($i = 0; $i < 5; $i++) {
  $nums[] = rand(-10,10);
}
print implode(" ", $nums) . "\n";
$big = 0;
$small = 0;
$zero = 0;
for ($i = 0; $i < count($nums); $i++) {
  if ($nums[$i] > 0) $big++;
  else if ($nums[$i] < 0) $small++;
  else $zero++;
}
print "0より大きい数の個数：" . $big . "\n";
print "0より小さい数の個数：" . $small . "\n";
print "0の個数：" . $zero . "\n";
?>
