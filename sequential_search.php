<?php
$list = array(54, 58, 60, 62, 65, 73, 75);
for ($i = 0; $i < 7; $i++) {
  if ($list[$i] == 65) {
    print("65は" . ++$i . "番目\n");
    break;
  }
}
