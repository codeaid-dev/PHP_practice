<?php
$src = trim(fgets(STDIN));

for($i = strlen($src) - 1; $i >= 0; $i--) {
  if($src[$i] == ">") {
    $dst .= "<";
  } else {
    $dst .= ">";
  }
}
print($dst . "\n");
