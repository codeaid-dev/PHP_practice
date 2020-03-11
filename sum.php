<?php
$nums = array(1,2,3,4,5,6,7,8,9);
$sum = 0;
for ($i = 0; $i < count($nums); $i++) {
  $sum += $nums[$i];
}
echo $sum . "<br>";
$sum = 0;
foreach ($nums as $num) {
  $sum += $num;
}
echo $sum;
?>
