<?php
for ($i = 0; $i < 5; $i++) {
  $nums[] = rand(1,10);
}
print implode(" ", $nums) . "\n";
for ($i = 0; $i < count($nums); $i++) {
  for ($w = 1; $w <= $nums[$i]; $w++) {
    print "*";
  }
  print "\n";
}
?>
