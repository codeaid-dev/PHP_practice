<?php
for ($i = 0; $i < 10; $i++) {
  $nums[] = rand(1,100);
  print $nums[$i] . " ";
}
print "\n";
//print implode(" ", $nums) . "\n";

foreach ($nums as $key => $value) {
  if ($value >= 50) {
    $up[] = $value;
  } else {
    $down[] = $value;
  }
}
for ($i = 0; $i < count($up); $i++) {
  print $up[$i] . " ";
}
print "\n";
for ($i = 0; $i < count($down); $i++) {
  print $down[$i] . " ";
}
print "\n";
//print implode(" ", $up) . "\n";
//print implode(" ", $down) . "\n";
?>
