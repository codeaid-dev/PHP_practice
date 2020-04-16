<?php
/**
 * 解答例1
 */
do {
  $card = [];
  for ($i = 0; $i < 5; $i++) {
    $card[] = rand(1, 13);
  }
  $counts = [];
  for ($i = 0; $i < count($card); $i++) {
    $key = $card[$i];
    if ($counts[$key]) $counts[$key] += 1;
    else $counts[$key] = 1;
  }
  foreach ($counts as $key => $val) {
    if ($val == 5) {
      $cnt = true;
      break;
    } else {
      $cnt = false;
    }
  }
} while ($cnt);

print(implode(" ", $card) . "\n");

$pair = 0;
$three_card = 0;
$four_card = 0;

foreach ($counts as $key => $val) {
  if ($val == 2) $pair++;
  if ($val == 3) $three_card++;
  if ($val == 4) $four_card++;
}

if ($four_card == 1) print("フォーカード");
else if ($three_card == 1 && $pair == 1) print("フルハウス");
else if ($three_card == 1 && $pair == 0) print("スリーカード");
else if ($pair == 2) print("ツーペア");
else if ($pair == 1) print("ワンペア");
else print("ノーハンド");
print("\n");

/**
 * 解答例2, 3
 */
do {
  $cards = [];
  for ($i = 0; $i < 5; $i++) {
    $cards[] = rand(1, 13);
  }
  $count1 = array_count_values($cards);
} while (in_array(5, $check));

print(implode(" ", $cards) . "\n");

// 解答例2
$pair = 0;
$three_card = 0;
$four_card = 0;

foreach ($count1 as $key => $val) {
  if ($val == 2) $pair++;
  if ($val == 3) $three_card++;
  if ($val == 4) $four_card++;
}
if ($four_card == 1) print("フォーカード");
else if ($three_card == 1 && $pair == 1) print("フルハウス");
else if ($three_card == 1 && $pair == 0) print("スリーカード");
else if ($pair == 2) print("ツーペア");
else if ($pair == 1) print("ワンペア");
else print("ノーハンド");

print("\n");

// 解答例3
if (in_array(4, $count1)) print("フォーカード");
else if (in_array(3, $count1)){
  if (in_array(2, $count1)) print("フルハウス");
  else print("スリーカード");
} else {
  $count2 = array_count_values($count1);
  if (in_array(2, $count2)) print("ツーペア");
  else if (in_array(3, $count2)) print("ワンペア");
  else print("ノーハンド");
}
print("\n");
