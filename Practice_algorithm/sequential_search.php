<?php
function sequential_search($list, $search) {
  $flag = false;
  for ($i = 0; $i < count($list); $i++) {
    if ($list[$i] == $search) {
      print "{$search}は" . ++$i . "番目\n";
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
sequential_search(array(54, 58, 60, 62, 65, 73, 75), $s);
