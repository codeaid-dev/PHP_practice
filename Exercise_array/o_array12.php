<?php
$numbers = [];
$max = 13;
$i = 0;
while ($i < $max) {
  $n = rand(1,$max);
  if (!in_array($n, $numbers)) {
    $numbers[$i] = $n;
    $i++;
  } else {
    continue;
  }
}
$card["Heart"] = $numbers;
print "Before Sorting:\n";
foreach ($card as $key => $value) {
  print $key . ": " . implode(",", $value) . "\n";
}
sort($card["Heart"]);
print "After Value Sorting:\n";
foreach ($card as $key => $value) {
  print $key . ": " . implode(",", $value) . "\n";
}
?>
