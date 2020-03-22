<?php
$n = (int)trim(fgets(STDIN));

$arr = array_fill(1, $n, 0);
var_dump($arr);
for ($i = 1; $i <= $n; $i++) { 
  $arr[(int)trim(fgets(STDIN))]++;
}
var_dump($arr);

$before = -1;
$after = -1;
for ($i = 1; $i <= $n; $i++) {
  if ($arr[$i] == 0) $before = $i;
  if ($arr[$i] == 2) $after = $i;
}
if ($before == -1) print "Correct";
else print $after . " " . $before;
