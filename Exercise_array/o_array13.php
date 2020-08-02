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
$card["Diamond"] = $numbers;
$card["Spade"] = $numbers;
$card["Club"] = $numbers;
print "Before Sorting:\n";
foreach ($card as $key => $value) {
  print $key . ": " . implode(",", $value) . "\n";
}
print "After Key & Value Sorting:\n";
ksort($card);
foreach ($card as $key => $value) {
  sort($value);
  print $key . ": " . implode(",", $value) . "\n";
}
?>
