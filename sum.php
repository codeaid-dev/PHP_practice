<?php
$nums = array(1,2,3,4,5,6,7,8,9);
// 解答例1
$sum = 0;
for ($i = 0; $i < count($nums); $i++) {
  $sum += $nums[$i];
}
print($sum . "\n");

// 解答例2
$sum = 0;
foreach ($nums as $num) {
  $sum += $num;
}
print($sum . "\n");
