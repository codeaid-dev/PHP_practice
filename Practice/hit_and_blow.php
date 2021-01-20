<?php
// ランダムに4桁の数値を作成する
// 同じ数値が重複しないようにする
$digits = [];
while (count($digits) != 4) {
  $n = rand(0,9);
  if (!in_array($n, $digits)) {
    $digits[] = $n;
  }
}

$target = implode("",$digits);
while (true) {
  $num = 0;
  $nums = [];
  $hit = 0;
  $blow = 0;
  // 4桁の入力を求める
  while(strlen($num) != 4) {
    print "数字入力（4桁）：";
    $num = trim(fgets(STDIN));
  }
  for ($i = 0; $i < strlen($num); $i++) {
    $nums[] = substr($num, $i, 1);
  }

  // 入力した4桁とランダムに選んだ4桁を比較する
  // 同じ数値が重複していないことが前提
  for ($i = 0; $i < count($nums); $i++) {
    for ($j = 0; $j < count($nums); $j++) {
      if ($nums[$i] == $digits[$j]) {
        if ($i == $j) {
          $hit++;
        } else {
          $blow++;
        }
        break;
      }
    }
  }

  if ($hit == 4) {
    print "クリア！！\n";
    break;
  } else {
    print "{$hit} hit\n";
    print "{$blow} blow\n";
  }
}
print "ターゲット：" . $target . "\n";
?>
