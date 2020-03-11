<?php
print("please input:\n");
$a = trim(fgets(STDIN));
if ($a < 20) {
  $text = "未成年\n";
} else {
  $text = "成人\n";
}
print($text);
