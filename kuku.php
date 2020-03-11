<?php
for ($x = 1; $x < 10; $x++) {
  for ($y = 1; $y < 10; $y++) {
    if ($y == 9) {
      echo $x * $y;
    } else {
      echo $x * $y . ",";
    }
  }
  echo "<br>";
}
?>
