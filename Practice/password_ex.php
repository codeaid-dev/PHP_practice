<?php
print("パスワード桁数：");
$wc = trim(fgets(STDIN));
$ascii = [];
$password = [];
for ($dec = 33; $dec <= 126; $dec++) {
  $ascii[] = chr($dec);
}
for ($i = 0; $i < $wc; $i++) {
  $index = rand(0, count($ascii)-1);
  $password[] = $ascii[$index];
}
$pass_str = implode($password);
print("password: " . $pass_str . "\n");
