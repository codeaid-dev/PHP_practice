<?php
include 'stationery.php';

print "入力：";
$str = trim(fgets(STDIN));
$price = stationery_check($str);
$price_tax = price($price, 10);
print "{$str}の値段は{$price}円で、税込金額は{$price_tax}です\n";
?>
