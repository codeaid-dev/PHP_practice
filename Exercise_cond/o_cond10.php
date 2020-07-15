<?php
$yen1 = 2;
$yen5 = 1;
$total = $yen5 * 5 + $yen1;
for ($i = 1; $i <= $total; $i++) {
  if ($i % 5 <= $yen1) {
    print $i."\n";
  }
}
?>
