<?php
print "入力：";
$str = trim(fgets(STDIN));
if (!strcasecmp($str, "Osaka") || 
!strcasecmp($str, "Hyogo") || 
!strcasecmp($str, "Kyoto") || 
!strcasecmp($str, "Nara") || 
!strcasecmp($str, "Wakayama")) {
  print "近畿地方\n";
} else {
  print "知りません\n";
}
?>
