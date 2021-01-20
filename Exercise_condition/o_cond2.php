<?php
print "入力１：";
$str1 = trim(fgets(STDIN));
print "入力２：";
$str2 = trim(fgets(STDIN));
if (!strcasecmp($str1, $str2)) {
  print "同じです\n";
} else {
  print "違います\n";
}
?>
