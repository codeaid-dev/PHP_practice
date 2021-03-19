<?php
// ランダムに4桁の数値を作成する
for ($i = 0; $i < 4; $i++) {
  $digits[] = rand(0,9);
}

$target = implode("",$digits);
while (true) {
  $num = 0;
  $nums = [];
  $check = [];
  $hit = 0;
  $blow = 0;
  // 4桁の入力を求める
  while(strlen($num) != 4) {
    print "数字入力（4桁）：";
    $num = trim(fgets(STDIN));
  }
  for ($i = 0; $i < strlen($num); $i++) {
    $nums[] = substr($num, $i, 1);
    $check[] = "";
  }

  // 入力した4桁とランダムに選んだ4桁を比較する
  // 同じ数値が存在することを考慮して$check[]配列に情報を入れる
  // hitチェック
  for ($i = 0; $i < count($nums); $i++) {
    if ($nums[$i] == $digits[$i]) {
      $hit++;
      $check[$i] = "hit";
    }
  }
  // blowチェック
  for ($i = 0; $i < count($nums); $i++) {
    if ($check[$i] == "hit") continue;
    for ($j = 0; $j < count($nums); $j++) {
      if ($nums[$j] == $digits[$i]) {
        if ($check[$j] != "hit" && $check[$j] != "blow") {
          $blow++;
          $check[$j] = "blow";
        }
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
