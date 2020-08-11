<?php
function strAdd($str1, $str2) {
  $str1_len = strlen($str1);
  $str2_len = strlen($str2);
  for ($i = 0; $i < $str1_len || $i < $str2_len; $i++) {
    if ($i < $str1_len) {
      $result[] = substr($str1, $i, 1);
    }
    if ($i < $str2_len) {
      $result[] = substr($str2, $i, 1);
    }
  }
  return implode("", $result);
}

print "入力：";
$str = trim(fgets(STDIN));
$param = explode(",", $str);
print strAdd($param[0], $param[1]) . "\n";
?>
