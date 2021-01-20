<?php

// 解答例１
print("数値を入力：");
$list = array_map('intval', explode(',', trim(fgets(STDIN))));
sort($list);
foreach (array_unique($list) as $val) {
  $result[] = $val;
}
print($result[2] . "\n");

// 解答例２
print("数値を入力：");
$list = explode(',', trim(fgets(STDIN)));
for ($i = count($list); $i >= 1; $i--) {
  for ($s = 1; $s < $i; $s++) {
    if ($list[$s-1] > $list[$s]) {
      $w = $list[$s-1];
      $list[$s-1] = $list[$s];
      $list[$s] = $w;
    }
  }
}
foreach ($list as $key => $val) {
  if ($key == 0 || $tmp != $val) {
    $result[] = $val;
    $tmp = $val;
  }
}
print($result[2] . "\n");
