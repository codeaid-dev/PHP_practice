<?php
$num = [];
$sum = 0;
for ($i = 0; $i < 5 && $sum <= 100; $i++) {
  print $i+1 . "回目:";
  $num[$i] = trim(fgets(STDIN));
  $sum += $num[$i];
}
print implode(",", $num);
?>
