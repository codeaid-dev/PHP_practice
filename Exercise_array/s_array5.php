<?php
$tile = [];
for ($i = 0; $i < 3; $i++) {
  for ($j =0; $j < 2; $j++) {
    if ($j % 2 == 0) {
      $tile[$i][$j] = "白";
    } else {
      $tile[$i][$j] = "黒";
    }
  }
}
var_dump($tile);
?>
