<?php
for ($i = 0; $i < 10; $i++) {
  $nums[] = rand(1,100);
}
print implode(" ", $nums) . "\n";

foreach ($nums as $key => $value) {
  if ($value >= 50) {
    $up[] = $value;
  } else {
    $down[] = $value;
  }
}
print implode(" ", $up) . "\n";
print implode(" ", $down) . "\n";
?>
