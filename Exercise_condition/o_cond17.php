<?php
for ($i = 1; $i <= 20; $i++) {
  $dice1 = rand(1,6);
  $dice2 = rand(1,6);
  print $i . "回目：" . $dice1 . " " . $dice2;
  if ($dice1 == $dice2) {
    if ($dice1 % 2 == 0) {
      print "大当たり";
    } else {
      print "当たり";
    }
    break;
  }
  print "\n";
}
print "\n";
?>
