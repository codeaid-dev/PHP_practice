<?php
function price($price) {
  $price = $price * 1.1;
  return $price;
}

print "入力：";
$data = trim(fgets(STDIN));
print price($data) . "円\n";
?>
