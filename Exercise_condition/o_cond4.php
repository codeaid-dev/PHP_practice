<?php
$num = rand(1, 6);
if ($num == 3) {
  print "今日は最高です！\n";
} else if ($num % 2 == 0) {
  print "今日は普通の日です\n";
} else {
  print "今日は良くない日です\n";
}
?>
