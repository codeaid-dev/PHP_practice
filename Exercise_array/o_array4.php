<?php
print "入力：";
$str = trim(fgets(STDIN));
$nums = explode(",", $str);
for ($i = 0; $i < count($nums)-1; $i++) {
  $result[] = $nums[$i] + $nums[$i+1];
}
print implode(",", $result) . "\n";
?>
