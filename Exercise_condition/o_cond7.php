<?php
print "性別は？";
$person = trim(fgets(STDIN));
print "年齢は？";
$age = trim(fgets(STDIN));
$str1 = "本厄年です\n";
$str2 = "本厄年ではありません\n";
if ($person == "male") {
  if ($age == 25 || $age == 42 || $age == 61) {
    print $str1;
  } else {
    print $str2;
  }
} else if ($person == "female") {
  if ($age == 19 || $age == 33 || $age == 37 || $age == 61) {
    print $str1;
  } else {
    print $str2;
  }
} else {
  print "判定できませんでした\n";
}
?>
