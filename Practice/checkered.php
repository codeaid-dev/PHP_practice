<?php
print("横幅と縦幅：");
$list = explode(",", trim(fgets(STDIN)));
$width = $list[0];
$height = $list[1];
$tile = array('O', 'X');
$index = 1;
for($i = 0; $i < $height; $i++) {
  $str = "";
  $index = 1 - $index;
  for($j = 0; $j < $width; $j++) {
    if($j % 2 == 0) {
      $str .= $tile[$index];
    } else {
      $str .= $tile[1 - $index];
    }
  }
  print($str . "\n");
}
