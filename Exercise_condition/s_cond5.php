<?php
print "年齢は？";
$age = trim(fgets(STDIN));
if ($age < 20) {
  print "未成年\n";
} else {
  if ($age >= 65 && $age < 75) {
    print "前期高齢者\n";
  } else if ($age >= 70) {
    print "後期高齢者\n";
  } else {
    print "成人\n";
  }
}
?>
