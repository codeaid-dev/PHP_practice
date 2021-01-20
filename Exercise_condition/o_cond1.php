<?php
$frt1 = "Apple";
$frt2 = "Banana";
$veg1 = "Carrot";
$veg2 = "Onion";
print "どれですか？";
$ans = trim(fgets(STDIN));
if ($ans == $frt1 || $ans == $frt2) {
  print "フルーツです\n";
} else if ($ans == $veg1 || $ans == $veg2) {
  print "野菜です\n";
} else {
  print "それはありません\n";
}
?>
