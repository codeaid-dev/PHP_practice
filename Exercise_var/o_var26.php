<?php
$turi = 1000 - 308;
printf("500円玉は%d枚\n", $turi / 500);
$turi = $turi % 500;
printf("100円玉は%d枚\n", $turi / 100);
$turi = $turi % 100;
printf("50円玉は%d枚\n", $turi / 50);
$turi = $turi % 50;
printf("10円玉は%d枚\n", $turi / 10);
$turi = $turi % 10;
printf("5円玉は%d枚\n", $turi / 5);
printf("1円玉は%d枚\n", $turi % 5);
?>
