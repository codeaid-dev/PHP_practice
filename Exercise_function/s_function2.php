<?php
function price($price, $tax=10) {
  $tax_amount = $price * ($tax / 100);
  return $price + $tax_amount;
}

print "入力：";
$data = trim(fgets(STDIN));
$nums = explode(",", $data);
print price($nums[0], $nums[1]) . "円\n";
print "省略した場合：" . price($nums[0]) . "円\n";
?>
