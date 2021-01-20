<?php
  $list = array(8, 5, 3, 6, 1, 9, 2, 7, 10, 4);
  for ($i = 0; $i < count($list); $i++ ) {
    $min = $i;
    for ($s = $i+1; $s < count($list); $s++) {
        if ($list[$s] < $list[$min]) {
          $min = $s;
        }
    }
    $w = $list[$i];
    $list[$i] = $list[$min];
    $list[$min] = $w;
    $str = implode(',', $list);
    print($str . "\n"); // for console
    //print($str . "<br>");
  }
