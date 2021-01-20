<?php
date_default_timezone_set('Asia/Tokyo');
$job1 = mktime(9, 0, 0, 7, 5, 2020);
$job2 = mktime(14, 0, 0, 7, 5, 2020);

if ($job1 < time()) {
  print "①は完了\n";
} else {
  print "①は未完\n";
}
if ($job2 < time()) {
  print "②は完了\n";
} else {
  print "②は未完\n";
}
?>
