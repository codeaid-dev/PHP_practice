<?php
  $i = 0;
  while (TRUE) {
    $num = rand(1, 20);
    if ($num % 2 == 0) {
      echo $num . "<br>";
      $i++;
      if ($i == 10)
        break;
    }
  }
?>
