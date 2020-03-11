<?php
// バブルソート
$nums = array(3, 5, 2, 1, 4, 9, 8, 6, 7);

for ($i = 0; $i < count($nums); $i++) {
  for ($j = 1; $j < count($nums); $j++) {
    if ($nums[$j-1] > $nums[$j]) {
      $tmp = $nums[$j];
      $nums[$j] = $nums[$j-1];
      $nums[$j-1] = $tmp;
    }
  }
  foreach ($nums as $num) echo $num . ",";
  echo "<br>";
}
foreach ($nums as $num) {
    echo $num . "<br>";
}
echo $num . "<br>";

// 挿入ソート（インサーションソート）
$list = array(3, 5, 2, 1, 4, 9, 8, 6, 7);

for($cnt = 1; $cnt < count($list); $cnt++ ) {
    $tmp = $list[$cnt];
    for($index = $cnt; $index >= 1 && $list[$index-1] > $tmp; $index--) {
        $list[$index] = $list[$index-1];
    }
    $list[$index] = $tmp;
    foreach ($list as $num) echo $num . ",";
    echo "<br>";
}
foreach ($list as $n) {
    echo $n . "<br>";
}
echo $num . "<br>";

// 選択ソート（セレクションソート）
$list = array(30, 50, 20, 10, 40, 90, 80, 60, 70);
$flag = false;
for($cnt = 0; $cnt < count($list); $cnt++ ) {
    $min = $cnt;
    for ($index = $cnt+1; $index < count($list); $index++) {
        if ($list[$index] < $list[$cnt]) {
            $min = $index;
            $flag = true;
        }
        if ($flag) {
            $tmp = $list[$cnt];
            $list[$cnt] = $list[$min];
            $list[$index] = $tmp;
            $flag = false;
        }
    }
    foreach ($list as $num) echo $num . ",";
    echo "<br>";
}
foreach ($list as $n) {
    echo $n . "<br>";
}
echo $num . "<br>";

$list = array(301, 501, 201, 101, 401, 901, 801, 601, 701);
for($cnt = 0; $cnt < count($list); $cnt++) {
    for($j = $cnt+1; $j < count($list); $j++) {
        if($list[$j] < $list[$cnt]) {
            $tmp = $list[$cnt];
            $list[$cnt] = $list[$j];
            $list[$j] = $tmp;
        }
    }
    foreach ($list as $num) echo $num . ",";
    echo "<br>";
}
foreach ($list as $n) {
    echo $n . "<br>";
}
?>
