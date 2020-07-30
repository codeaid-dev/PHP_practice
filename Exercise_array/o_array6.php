<?php
for ($i = 0; $i < 5; $i++) {
  $nums[] = rand(1,20);
}
print "入力：";
$num = trim(fgets(STDIN));
if (in_array($num, $nums)) {
  print "ありました\n";
} else {
  print "ないです\n";
}
?>
