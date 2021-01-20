<?php
print "年齢は？";
$age = trim(fgets(STDIN));
if ($age < 20) {
  print "未成年\n";
} else {
  print "成人\n";
}
?>
