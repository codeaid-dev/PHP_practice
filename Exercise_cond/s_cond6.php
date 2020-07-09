<?php
print "年齢は？";
$age = trim(fgets(STDIN));
if ($age < 20) {
  if ($age >= 6 && $age <= 15) {
    print "未成年（義務教育の対象）";
  } else {
    print "未成年\n";
  }
} else {
  if ($age >= 60 && $age < 70) {
    print "高齢者\n";
  } else if ($age >= 70) {
    print "後期高齢者\n";
  } else {
    print "成人\n";
  }
}
?>
