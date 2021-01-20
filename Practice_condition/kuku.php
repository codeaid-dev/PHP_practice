<?php
// 解答例1
for ($x = 1; $x < 10; $x++) {
  for ($y = 1; $y < 10; $y++) {
    if ($y == 9) {
      echo $x . "x" . $y . "=" . $x * $y;
    } else {
      echo $x . "x" . $y . "=" . $x * $y . ",";
    }
  }
  //echo "<br>";
  echo "\n";
}
// 解答例2
foreach (range(1, 9) as $x) {
  foreach (range(1, 9) as $y) {
    if ($y == 9) {
      print($x . "x" . $y . "=" . $x * $y);
    } else {
      print($x . "x" . $y . "=" . $x * $y . ",");
    }
  }
  print("\n");
}
// 解答例3
foreach (range(1, 9) as $x) {
  foreach (range(1, 9) as $y) {
    $kuku[] = $x . "x" . $y . "=" . $x * $y;
  }
  print implode(",", $kuku) . "\n";
  $kuku = [];
}
?>
