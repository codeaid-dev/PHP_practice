<?php
  //$rate = 0;
  for ($i = 1; $i <= 5; $i++) {
    print("１：グー\n");
    print("２：チョキ\n");
    print("３：パー\n");
    print("１〜３のどれかを入力してください。\n");
    $a = trim(fgets(STDIN));
    $b = rand(1, 3);
    if (($a == 1 && $b == 2) || ($a == 2 && $b == 3) || ($a == 3 && $b == 1)) {
      $rate += 1;
      print("あなたの勝ち:" . $b . "\n");
    } else if (($a == 1 && $b == 3) || ($a == 2 && $b == 1) || ($a == 3 && $b == 2)) {
      print("コンピューターの勝ち:" . $b . "\n");
    } else {
      print("あいこ:" . $b . "\n");
    }
  }
  $rate = $rate / 5 * 100;
  print("勝率は" . $rate . "%です\n");
