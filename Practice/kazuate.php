<?php
$min = 1;
$max = 10;
$round = 5;
for ($i=0; $i<3; $i++) {
  $comp[] = rand($min,$max);
}
for ($i=1; $i<=$round; $i++) {
  while (true) {
    print "入力：";
    $nums = explode(",", trim(fgets(STDIN)));
    if (count($nums) != 3) continue;
    if (($nums[0]>=$min && $nums[0]<=$max)
        && ($nums[1]>=$min && $nums[1]<=$max)
        && ($nums[2]>=$min && $nums[2]<=$max))
      break;
  }

  print $i . "回目：";
  $end = 0;
  $result = [];
  foreach ($comp as $key => $value) {
    if ($value == $nums[$key]) {
      $result[] = $nums[$key];
      $end++;
    }
    else $result[] = "*";
  }
  print implode(" ", $result);
  if ($end == 3) {
    print "当たり！\n";
    break;
  }
  print "\n";
}
print "コンピューター：" . implode(" ", $comp) . "\n";
?>
