<?php
function calc_bmi($weight, $tall, $bmi=true) {
  if ($bmi) {
    $result = $weight / (($tall/100) ** 2);
  } else {
    $result = (($tall/100) ** 2) * 22;
  }
  return $result;
}

print "体重は？";
$w = trim(fgets(STDIN));
print "身長は？";
$t = trim(fgets(STDIN));
print "1:BMI 2:適正体重？";
$b = trim(fgets(STDIN));
if ($b == 1) {
  printf("体重は%dkgで身長が%dcmのBMIは%.2fです。\n", $w, $t, calc_bmi($w, $t, true));
} else {
  printf("身長が%dcmの適正体重は%.2fkgです。\n",$t, calc_bmi($w, $t, false));
}
?>
