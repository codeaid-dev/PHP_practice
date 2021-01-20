<?php
print "入力：";
$str = trim(fgets(STDIN));
$flag = false;
$start = 0;
$end = 0;
for ($i = 0; $i < strlen($str); $i++) {
  $ch = substr($str, $i, 1);
  if ($ch == "(") {
    $start = $i;
    $flag = true;
  } else if ($ch == ")" && $flag == true) {
    $end = $i;
    $replace = "";
    $len = $end-$start+1;
    $search = substr($str, $start, $len);
    for ($j = 0; $j < $len-2; $j++) {
      $replace .= "x";
    }
    $replace = "(" . $replace . ")";
    $str = str_replace($search, $replace, $str);
  }
}
print "結果表示：" . $str . "\n";
?>
