<?php
$a = 0;
$b = 0;
function add($a, $b) {
  global $b;
  $b += 2;
  $a = $a + $b;
  return $a;
}
print add(1,1) . "\n";

$a = 0;
$b = 0;
function add2($a, $b) {
  $GLOBALS['b'] += 3;
  $a = $a + $b;
  return $a;
}
print add2(1,1) . "\n";
?>
