<?php
print "入力：";
$str = trim(fgets(STDIN));
if ($str == "Osaka" || $str == "Hyogo" || $str == "Kyoto" || $str == "Nara" || $str == "Wakayama") {
  print "近畿地方\n";
} else {
  print "知りません\n";
}
?>
