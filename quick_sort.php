<?php
$list = array(8, 5, 3, 6, 1, 9, 2, 7, 10, 4);

$str = implode(',', $list);
print($str . "\n"); // for console
//print($str . "<br>");

$result = quicksort($list);

$str = implode(',', $result);
print($str . "\n"); // for console
//print($str . "<br>");

function quicksort($list) {
  $left = [];
  $right = [];
  if (count($list) <= 1) {
    return $list;
  }

  $pivot = $list[count($list)-1];
  $pivot_count = 0;

  for ($i = 0; $i < count($list); $i++) {
    if ($list[$i] < $pivot) {
      $left[] = $list[$i];
    } else if ($list[$i] > $pivot) {
      $right[] = $list[$i];
    } else {
      $pivot_count++;
    }
  }

  $rep = [];
  while ($pivot_count > 0) {
    $rep[] = $pivot;
    $pivot_count--;
  }

  $left = quicksort($left);
  $right = quicksort($right);

  $str = implode(',', array_merge($left, $rep, $right));
  print($str . "\n"); // for console
  //print($str . "<br>");

  return array_merge($left, $rep, $right);
}
