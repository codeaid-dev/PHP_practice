<?php
print("パスワード桁数：");
$wc = trim(fgets(STDIN));
$ascii = ['a', 'b', 'c', 'd', 'E', 'F', 'G', 'H', '0', '1', '2', '3', '4', '!', '@', '#', '$', '%'];
$password = [];
for ($i = 0; $i < $wc; $i++) {
  $index = rand(0, count($ascii)-1);
  $password[] = $ascii[$index];
}
$pass_str = implode($password);
print("password: " . $pass_str . "\n");
