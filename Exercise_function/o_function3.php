<?php
function pyramid($word, $num) {
  $str = "";
  for ($i=1; $i<=$num; $i++) {
    for ($j=0; $j<$i; $j++) {
      $str .= $word;
    }
    $str .= "\n";
  }
  return $str;
}

print "入力：";
$words = trim(fgets(STDIN));
$param = explode(",", $words);
print pyramid($param[0], $param[1]);
?>
