<?php
$ascii = [];
$password = [];
for ($dec = 33; $dec <= 126; $dec++) {
  $ascii[] = chr($dec);
}
for ($i = 0; $i < 8; $i++) {
  $index = rand(0, count($ascii)-1);
  $password[] = $ascii[$index];
}
$pass_str = implode($password);
echo "password: ".$pass_str;
?>