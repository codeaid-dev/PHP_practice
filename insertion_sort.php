<?php
  $list = array(8, 5, 3, 6, 1, 9, 2, 7, 10, 4);
  for($i = 1; $i < count($list); $i++ ) {
      $w = $list[$i];
      for($s = $i; $s >= 1 && $list[$s-1] > $w; $s--) {
          $list[$s] = $list[$s-1];
      }
      $list[$s] = $w;
      $str = implode(',', $list);
      //print($str . "\n"); // for console
      print($str . "<br>");
  }
