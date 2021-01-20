<?php
print "横幅と縦幅：";
$nums = explode(",", trim(fgets(STDIN)));
$width = $nums[0];
$height = $nums[1];
$color = array("o", "x");
$order = 1;
for($i = 0; $i < $height; $i++) {
  $str = "";
  $order = 1 - $order;
  for($j = 0; $j < $width; $j++) {
    if($j % 2 == 0) {
      $str .= $color[$order];
    } else {
      $str .= $color[1 - $order];
    }
  }
  print $str . "\n";
}
?>
