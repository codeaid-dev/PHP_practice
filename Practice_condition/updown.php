<?php
print("比較する数値を入力：\n");
while ($dst = trim(fgets(STDIN))) {
  if (!isset($src)) {
    $src = $dst;
    continue;
  }

  if ($src < $dst) {
    print(($dst-$src) . "増加\n");
  } else if ($src > $dst) {
    print(($src-$dst) . "減少\n");
  } else {
    print("同じ\n");
  }
  $src = $dst;
}
