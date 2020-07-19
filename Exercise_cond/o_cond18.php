<?php
print "入力：";
$num = trim(fgets(STDIN));
$total = 0;
for ($i = 1; $total < $num; $i++) {
  $str = $total . "+" . $i;
  $total += $i;
}
print $str . "\n";
?>
