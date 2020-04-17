<?php
$coin = explode( ",", trim(fgets(STDIN)));
$yen1 = $coin[0];
$yen5 = $coin[1];
$total = $yen5 * 5 + $yen1;

for ($i = 1; $i <= $total; $i++) {
  if ($i <= $yen1) { // 1円で出せる金額
    print($i . "\n");
  } else if ($i % 5 == 0 || $i % 5 <= $yen1) { // 5円 or 1円と合わせて出せる金額
    print($i . "\n");
  }
}
