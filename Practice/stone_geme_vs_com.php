<?php
$max = 0;
while ($max < 10) {
  print "石の数を入力してください（10個以上)：";
  $max = trim(fgets(STDIN));
}

$turn = ($max%4 == 1) ? 2 : 1;
while (true) {
  print "石の数：" . $max . "\n";
  if ($max <= 1) break;

  if ($turn == 1) {
    print "わたしの番です\n";
    $p1 = 0;
    if ($max <= 4) {
      $p1 = $max - 1;
    } else {
      $p1 = ($max - 1) % 4;
      if ($p1 == 0) {
        $p1 = 1;
      }
    }
    print "コンピューターは{$p1}個取りました\n";
    $turn = 2;
    $max -= $p1;
  } else {
    print "あなたの番です\n";
    $p2 = 0;
    while ($p2 < 1 || $p2 > 3) {
      print "いくつ取りますか？（1〜3個）";
      $p2 = trim(fgets(STDIN));
    }
    $turn = 1;
    $max -= $p2;
  }
}

if ($max == 1 && $turn == 1) {
  print "あなたの勝ちです\n";
} else if ($max == 1 && $turn == 2) {
  print "コンピューターの勝ちです\n";
} else if ($max < 1 && $turn == 1) {
  print "あなたの反則負けです\n";
} else if ($max < 1 && $turn == 2) {
  print "コンピューターの反則負けです\n";
}
?>
