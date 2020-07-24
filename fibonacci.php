<?php
$src = [1,2,3,4,5,6,7,8,9];
for ($i = 0; $i < count($src); $i++) {
  print $i+1 . "段目：" . fibonacci_ex($src[$i]) . "通り\n";
}

function fibonacci_ex($n) {
  if ($n == 1 || $n == 2) {
    return $n;
  } else {
    return fibonacci_ex($n-2) + fibonacci_ex($n-1);
  } 
}
?>
