<?php

// 判定と繰り返し　解答例
// ********** Q1 **********
$a = 1;
$b = 2;

if ((($a > 3) && ($b <= 2)) || (($b > 0) && ($a == 1))) {
  print "評価はtrueでした\n";
} else {
  print "評価はfalseでした\n";
}
// 評価はtrueでした

// ********** Q2 **********
// A. D. E. F.

// ********** Q3 **********
$data = false;
if ($data) {
    print "Hello";
} else {
    print "Bye";
}
// B. 「Bye」が表示される

// ********** Q4 **********
$data = '20';
if ($data == 20) {
    print "Yes";
} else {
    print "No";
}
// A. 「Yes」が表示される

// ********** Q5 **********
if (abs(-100) > abs(-50)) {
  print "AAA";
}
if ("abc" > "xyz") {
  print "BBB";
} else if ("567" < "890") {
  print "CCC";
}
// C. AAACCCが表示される

// ********** Q6 **********
if ('5member' < 44) {
  print "44";
} else {
  print "5member";
}
// A. 「44」が表示される

// ********** Q7 **********
if (strcmp("54321", "6789") > 0) {
  print "Over";
} else {
  print "Under";
}
// B. 「Under」が表示される

// ********** Q8 **********
$ans = 2 <=> 22.5;
if ($ans > 0) {
    print "Over";
} else {
    print "Under";
}
// B. 「Under」が表示される

// ********** Q9 **********
$data = 80;
if (($data >= 70) && ($data <= 100)) {
    print "Success";
} else if (($data >= 30) && ($data < 70)) {
    print "Fail";
}
// C.

// ********** Q10 **********
for ($k = 0; $k <= 10; $k++) {
  if ($k % 3 == 0) {
      print "3";
  } else if ($k % 4 == 0) {
      print "4";
  } else {
      print "0";
  }
}
// B. 30034030430

// ********** Q11 **********
for ($i = 1; $i <= 20; $i++) {
  if ($i % 2 == 0) {
    print $i . "\n";
  }
}

// ********** Q12 **********
for ($i = 0; $i < 5; $i++) {
  for ($j = 0; $j < 5; $j++) {
    print "▲";
  }
  print "\n";
}

// ********** Q13 **********
print "年齢は？";
$age = trim(fgets(STDIN));
if ($age < 20) {
  print "未成年\n";
  if ($age >= 6 && $age <= 15) {
    print "未成年（義務教育の対象）\n";
  }
} else {
  if ($age >= 65 && $age < 75) {
    print "前期高齢者\n";
  } else if ($age >= 75) {
    print "後期高齢者\n";
  } else {
    print "成人\n";
  }
}

// ********** Q14 **********
print "1円玉の枚数：";
$yen1 = trim(fgets(STDIN));
print "5円玉の枚数：";
$yen5 = trim(fgets(STDIN));
$total = $yen5 * 5 + $yen1;
for ($i = 1; $i <= $total; $i++) {
  if ($i % 5 <= $yen1) {
    print $i."\n";
  }
}

// ********** Q15 **********
$num = rand(1, 100);
if ($num % 2 == 0) {
  print "偶数：" . $num;
} else {
  print "奇数：" . $num;
}

// ********** Q16 **********
$atari = 0;
$hazure = 0;
for ($i = 0; $i < 3; $i++) {
  print "数値を入力：";
  $ans = trim(fgets(STDIN));
  $cmp = rand(1, 10);
  if ($ans == $cmp) {
    $atari++;
    print "あたり！\n";
  } else {
    $hazure++;
    print "はずれ\n";
  }
}
print $atari . "勝" . $hazure . "敗です\n";

// ********** Q17 **********
$str = "";
while (strlen($str) < 10) {
  print "半角英数字入力：";
  $str .= trim(fgets(STDIN));
}
$str = substr($str, 0, 10);
print "入力文字：" . $str . "\n";

// ********** Q18 **********
$str = "Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday";
$chk = "day";
$cnt = 0;
$tmp = "";
for ($i = 0; $i < strlen($str); $i++) {
  $tmp = substr($str, $i, strlen($chk));
  if ($tmp == $chk) {
    $cnt++;
  }
}
print "dayの数は：" . $cnt . "\n";

// ********** Q19 **********
$f = -10;
while ($f <= 10) {
  $c = ($f - 32) * 5 / 9;
  printf("華氏%d度 = 摂氏%d度\n", $f, $c);
  $f += 5;
}

// ********** Q20 **********
print "性別は？";
$person = trim(fgets(STDIN));
print "年齢は？";
$age = trim(fgets(STDIN));
$str1 = "本厄年です\n";
$str2 = "本厄年ではありません\n";
if ($person == "male") {
  if ($age == 25 || $age == 42 || $age == 61) {
    print $str1;
  } else {
    print $str2;
  }
} else if ($person == "female") {
  if ($age == 19 || $age == 33 || $age == 37 || $age == 61) {
    print $str1;
  } else {
    print $str2;
  }
} else {
  print "判定できませんでした\n";
}

// ********** Q21 **********
print "入力：";
$str = trim(fgets(STDIN));
$flag = false;
$start = 0;
$end = 0;
for ($i = 0; $i < strlen($str); $i++) {
  $ch = substr($str, $i, 1);
  if ($ch == "(") {
    $start = $i;
    $flag = true;
  } else if ($ch == ")" && $flag == true) {
    $end = $i;
    $replace = "";
    $len = $end-$start+1;
    $search = substr($str, $start, $len);
    for ($j = 0; $j < $len-2; $j++) {
      $replace .= "x";
    }
    $replace = "(" . $replace . ")";
    $str = str_replace($search, $replace, $str);
  }
}
print "結果表示：" . $str . "\n";
