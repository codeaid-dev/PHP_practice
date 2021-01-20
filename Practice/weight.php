<?php
print "体重を整数値で入力してください。\n";
print "入力を終えるときには\"END\"を入力してください。\n";
$weight = [0, 0, 0, 0, 0, 0];
$total = 0;
while (true) {
  print "体重：";
  $num = trim(fgets(STDIN));
  if ($num == "END") break;
  if ($num < 0) {
    print "入力された数値は負の値です。\n";
    continue;
  }

  if ($num < 40) {
    $weight[0]++;
  } else if ($num >=40 && $num < 50) {
    $weight[1]++;
  } else if ($num >= 50 && $num < 60) {
    $weight[2]++;
  } else if ($num >= 60 && $num < 70) {
    $weight[3]++;
  } else if ($num >= 70 && $num < 80) {
    $weight[4]++;
  } else {
    $weight[5]++;
  }
  // 計算でキーを算出する方法
  //$num = floor(($num-30)/10);
  //$weight[$num < 0 ? 0 : $num]++;
  $total++;
}
print "40kg未満は" . $weight[0] . "人\n";
for ($i = 1; $i < count($weight)-1; $i++) {
  printf("%dkg以上%dkg未満は%d人\n", $i*10+30, $i*10+40, $weight[$i]);
}
printf("80kg以上は%d人\n", $weight[count($weight)-1]);
printf("合計は%02d人\n", $total);

?>
