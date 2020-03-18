<?php
$list = array(8, 5, 3, 6, 1, 9, 2, 7, 10, 4);

$str = implode(',', $list);
print($str . "\n"); // for console

quicksort($list, 0, count($list)-1);

$str = implode(',', $list);
print($str . "\n"); // for console

function quicksort(&$list, $left, $right) {
  if ($left >= $right) {
    return;
  }
  $pivot = $list[(int)($left+$right)/2];
  $i = $left;
  $j = $right;
  while ($i <= $j) {
    while ($list[$i] < $pivot) {
      $i++;
    }
    while ($list[$j] > $pivot) {
      $j--;
    }
    if ($i > $j) {
      break;
    }
    $w = $list[$i];
    $list[$i] = $list[$j];
    $list[$j] = $w;
    $i++;
    $j--;
  }

  $str = implode(',', $list);
  print($str . "\n"); // for console

  quicksort($list,$left,$j);
  quicksort($list,$i,$right);
}
