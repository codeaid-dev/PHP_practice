<?php
$str1 = "AABABBABAA";
$str2 = "BABBBAAABA";
$count = 0;
for ($i = 0; $i < strlen($str1); $i++) {
  if (substr($str1, $i, 1) == substr($str2, $i, 1)) {
    $count++;
  }
}
print "同じ文字は：" . $count . "個\n";
?>
