<?php
$num = rand(1, 20);
$result = "";
for  ($i = 1; $i <= $num; $i++) {
  if ($i > $num/$i) {
    break;
  }
  if ($num % $i == 0) {
    $result .= $i . "x" . $num/$i . "=" . $num . " ";
  }
}
print $result . "\n";
?>
