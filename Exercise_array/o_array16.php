<?php
$nums = [];
$n = rand(1,9);
print "選んだ数値：{$n}\n";

for ($i = 0; $i < 10; $i++) {
  $n += $n;
  if (strlen($n) == 2) {
    $n = substr($n,0,1) + substr($n,1,1);
  }
  $nums[] = $n;
}

print implode(",", $nums) . "\n";
?>
