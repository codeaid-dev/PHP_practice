<?php
$total = 0;
for ($i = 0; $i < 5; $i++) {
  $nums[] = rand(1,10);
  $total += $nums[$i];
}
print implode(" ", $nums) . "\n";
print "合計値：" . $total . "\n";
$average = $total / count($nums);
print "平均値：" . $average . "\n";
$big = "平均値以上：";
$small = "平均値未満：";
for ($i = 0; $i < count($nums); $i++) {
  if ($nums[$i] >= $average) {
    $big .= $nums[$i] . " ";
  } else {
    $small .= $nums[$i] . " ";
  }
}
print $big . "\n";
print $small . "\n";
?>
