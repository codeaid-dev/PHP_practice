<?php
function binary_search($list, $search) {
  $flag = false;
  $low = 0;
  $high = count($list) - 1;
  while ($low <= $high) {
    $i = ($low + $high) / 2;
    if ($list[$i] < $search) {
      $low = $i + 1;
    } else if ($list[$i] > $search) {
      $high = $i - 1;
    } else {
      print("{$search}は" . ++$i . "番目\n");
      $flag = true;
      break;
    }
  }
  if (!$flag) {
    print "ありません\n";
  }
}

print "探索数値入力：";
$s = trim(fgets(STDIN));
binary_search(array(54, 58, 60, 62, 65, 73, 75), $s);
