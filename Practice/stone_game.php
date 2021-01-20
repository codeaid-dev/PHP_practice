<?php
$max = 0;
while ($max < 10) {
  print "石の数を入力してください（10個以上)：";
  $max = trim(fgets(STDIN));
}
$turn = 1;
while (true) {
  print "石の数：" . $max . "\n";
  if ($max <= 1) break;

  if ($turn == 1) {
    print "プレイヤー1の番です\n";
    $p1 = 0;
    while ($p1 < 1 || $p1 > 3) {
      print "いくつ取りますか？（1〜3個）";
      $p1 = trim(fgets(STDIN));
    }
    $turn = 2;
    $max -= $p1;
  } else {
    print "プレイヤー2の番です\n";
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
  print "プレイヤー2の勝ちです\n";
} else if ($max == 1 && $turn == 2) {
  print "プレイヤー1の勝ちです\n";
} else if ($max < 1 && $turn == 1) {
  print "プレイヤー2の反則負けです\n";
} else if ($max < 1 && $turn == 2) {
  print "プレイヤー1の反則負けです\n";
}
?>
