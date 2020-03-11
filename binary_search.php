<?php
$list = array(54, 58, 60, 62, 65, 73, 75);
$low = 0;
$high = count($list) - 1;
while ($low <= $high) {
  $i = ($low + $high) / 2;
  if ($list[$i] < 65) {
    $low = $i + 1;
  } else if ($list[$i] > 65) {
    $high = $i - 1;
  } else {
    print("65は" . ++$i . "番目\n");
    break;
  }
}
