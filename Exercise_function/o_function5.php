<?php
function spendday($year, $month, $day) {
  date_default_timezone_set('Asia/Tokyo');
  $diff = mktime(0,0,0,$month,$day,$year) - time();
  $day = (int)ceil($diff/60/60/24);
  return $day;
}

print "入力：";
$str = trim(fgets(STDIN));
$times = explode(",", $str);
print spendday($times[0], $times[1], $times[2]) . "日\n";
?>
