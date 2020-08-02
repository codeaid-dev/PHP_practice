<?php
$p = 100;
function price($p) {
  return $p * 1.1;
}

print $p . "円\n";
print price($p) . "円\n";
print $p . "円\n";
?>
