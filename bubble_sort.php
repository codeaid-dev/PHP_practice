<?php
  $list = array(8, 5, 3, 6, 1, 9, 2, 7, 10, 4);
  for ($i = count($list); $i >= 1; $i--) {
    for ($s = 1; $s < $i; $s++) {
      if ($list[$s-1] > $list[$s]) {
        $w = $list[$s-1];
        $list[$s-1] = $list[$s];
        $list[$s] = $w;
      }
    }
    $str = implode(',', $list);
    print($str . "\n"); // for console
    //print($str . "<br>");
  }


  print "2つ目のコード\n";
  $list = array(8, 5, 3, 6, 1, 9, 2, 7, 10, 4);
  for ($i = 0; $i < count($list); $i++) {
    for ($s = 1; $s < count($list); $s++) {
      if ($list[$s-1] > $list[$s]) {
        $w = $list[$s-1];
        $list[$s-1] = $list[$s];
        $list[$s] = $w;
      }
    }
    $str = implode(',', $list);
    print($str . "\n"); // for console
    //print($str . "<br>");
  }