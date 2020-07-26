<?php
$len = 0;
while ($len<1 || $len>10) {
  print "入力：";
  $nums = explode(",", trim(fgets(STDIN)));
  $len = count($nums);
  for ($i=0; $i<$len; $i++) {
    if ($nums[$i]>=1 && $nums[$i]<=10) continue;
    else {
      $len = 0;
      break;
    }
  }
}
$src = array(1,2,3,4,5,6,7,8,9,10);
$diff = [];
for ($i=0; $i<count($src); $i++) {
  $found = false;
  for ($j=0; $j<$len; $j++) {
    if ($src[$i] == $nums[$j]) $found = true;
  }
  if (!$found) $diff[] = $src[$i];
}
print "結果：" . implode(",", $diff) . "\n";

/* array_diff関数で同じことができる
   よく使う処理は関数にまとめるが、すでにPHPが持っているものもある
$diff = array_diff($src, $nums);
print "結果：" . implode(",", $diff) . "\n";
*/
?>
