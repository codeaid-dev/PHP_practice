<?php
for ($i = 1; $i <= 20; $i++) {
  if ($i % 4 == 0) {
    continue;
  }
  if ($i % 2 == 0) {
    print $i . "\n";
  }
}
?>
