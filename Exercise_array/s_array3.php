<?php
$nums = [2,6,1,7,3,9,8,5,4,0];

for ($i = 0; $i < count($nums); $i++) {
  if ($i == 0) {
    $key = $nums[$i];
    print $key . " ";
  } else {
    print $nums[$key] . " ";
    $key = $nums[$key];
  }
}
print "\n";
?>
