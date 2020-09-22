<?php
$alp = array("A","B","C","D","E","F","G",
            "H","I","J","K","L","M","N",
            "O","P","Q","R","S","T","U",
            "V","W","X","Y","Z");
$hide = rand(0,25);
//$hide = array_rand($alp, 1);
$str = "";
foreach($alp as $key => $value) {
  if ($key != $hide) {
    $str .= $value;
  }
}
print $str."\n";
print "抜けているのは？";
$ans = trim(fgets(STDIN));
if ($ans == $alp[$hide]) {
  print "正解！\n";
} else {
  print "不正解\n";
}

