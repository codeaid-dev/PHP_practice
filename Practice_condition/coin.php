<?php
/**
 * 解答例1
 */
print "1円玉の枚数：";
$yen1 = trim(fgets(STDIN));
print "5円玉の枚数：";
$yen5 = trim(fgets(STDIN));
$total = $yen5 * 5 + $yen1;
for ($i = 1; $i <= $total; $i++) {
  if ($i % 5 <= $yen1) {
    print $i."\n";
  }
}

/**
 * 解答例2
 */
print "1円玉の枚数：";
$yen1 = trim(fgets(STDIN));
print "5円玉の枚数：";
$yen5 = trim(fgets(STDIN));
$total = $yen5 * 5 + $yen1;
for ($i = 1; $i <= $total; $i++) {
  if ($i <= $yen1) { // 1円で出せる金額
    print $i . "\n";
  } else if ($i % 5 == 0 || $i % 5 <= $yen1) { // 5円 or 1円と合わせて出せる金額
    print $i . "\n";
  }
}
