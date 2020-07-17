<?php
$num = 0;
$year = 2045 - 2020;
for ($i = 0; $i < $year; $i++) {
  $num += rand(1, 100);
}
print "2045年に貯まった力の量：" . $num . "個\n";
if ($num >= $year*100*0.58) {
  print "AIに支配されずに済んだ\n";
} else {
  print "AIに支配された\n";
}
?>
