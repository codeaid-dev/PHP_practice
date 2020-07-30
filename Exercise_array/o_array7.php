<?php
$member["tanaka"] = rand(1,2);
$member["yamada"] = rand(3,4);
$member["suzuki"] = rand(5,6);
print "入力：";
$num = trim(fgets(STDIN));
$str = array_search($num, $member);
if ($str) {
  print "{$num}は{$str}さんです\n";
} else {
  print "いません\n";
}
?>
