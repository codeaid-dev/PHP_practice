<?php
function max_num($nums) {
  $max = 0;
  for ($i = 0; $i < count($nums); $i++) {
      if ($nums[$i] > $max) {
          $max = $nums[$i];
      }
  }
  return $max;
}

print("配列を入力：");
$nums = trim(fgets(STDIN));
$nums = explode(",", $nums);
print(max_num($nums) . "\n");
