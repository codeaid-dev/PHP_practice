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

  // 一番右の要素を軸要素とする
  $pivot = $list[count($list)-1];
  $pivot_count = 0;

  // 軸要素より小さければ左、大きければ右に格納する
  for ($i = 0; $i < count($list); $i++) {
    if ($list[$i] < $pivot) {
      $left[] = $list[$i];
    } else if ($list[$i] > $pivot) {
      $right[] = $list[$i];
    } else {
      $pivot_count++;
    }
  }

  // 軸要素と同じものをまとめる
  $rep = [];
  while ($pivot_count > 0) {
    $rep[] = $pivot;
    $pivot_count--;
  }

  $str = implode(',', array_merge($left, $rep, $right));
  print($str . "\n"); // for console
  //print($str . "<br>");

  // 再帰呼び出し（左用、右用）
  $left = quicksort($left);
  $right = quicksort($right);

  // 左+軸要素+右を連結して関数を終了する
  return array_merge($left, $rep, $right);
}
