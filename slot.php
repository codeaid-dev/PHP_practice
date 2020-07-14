<?php
function slot() {
  $list = ["●", "■", "▲"];
  $slot = [];
  $result = [];
  for ($i = 0; $i < 3; $i++) {
    $w = rand(0, 2);
    $slot[$i] = $list[$w];
  }
  print(implode(" ", $slot) . "\n");

  // 同じ要素の数を数える
  for ($i = 0; $i < count($slot); $i++) {
    $key = $slot[$i];
    if (!empty($result[$key])) $result[$key] += 1;
    else $result[$key] = 1;
  }
  //$result = array_count_values($slot); // この関数を使えば上記処理と同じ結果を出せる

  foreach ($result as $key => $val) {
    if ($val == 3) {
      if ($key == "●") $score = 100;
      else if ($key == "■") $score = 200;
      else $score = 300;
    } else {
      $score = 0;
      break;
    }
  }
  print($score . "\n");
  return $score;
}

for ($i = 0; $i < 3; $i++) {
  print($i+1 . "回目：");
  trim(fgets(STDIN));
  $res += slot();
}
print("合計：" . $res . "\n");
