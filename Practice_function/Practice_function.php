<?php
// 関数とファイル　解答例
// ********** Q1 **********
// D. function calc() {}

// ********** Q2 **********
add(10, 20);
ADD(10, 20);
// A. B.

// ********** Q3 **********
// C. 関数の引数には、呼び出し時に値がない場合に備え、デフォルトの値を指定できる

// ********** Q4 **********
function message($message, $name="hanako") {
  print "$message, $name";
}
function message($message="Hello", $name="taro") {
  print "$message, $name";
}
// A. C.

// ********** Q5 **********
// C. return文は値をカンマで区切ることで複数の値を返すことができる

// ********** Q6 **********
function score_check($num1, $num2, $num3) {
	$sum = $num1 + $num2 + $num3;
	return $sum;
}

$num1 = 30;
$num2 = 20;
$num3 = 30;

if (score_check($num1, $num2, $num3) >= 80) {
	print "Success !!";
} else if (score_check($num1, $num2, $num3) >= 50 &&
		score_check($num1, $num2, $num3) < 80) {
	print "Challenge !!";
} else {
	print "Failure !!";
}
// A. Success !!

// ********** Q7 **********
function countup($num) {
	for ($i = 0; $i < 10; $i++) {
		$num += 1;
	}
}

$num = 9;
countup($num);
print $num;
// A. 9

// ********** Q8 **********
// A. $GLOBALS

// ********** Q9 **********
function add($a, $b) {
  $a = 100;
  global $b;
  $b = 200;
  print 'local_$a => ' . $a. ', local_$b => ' . $b;
  print ", ";
}

$a = 10;
$b = 20;
add($a, $b);
print 'global_$a => ' . $a. ', global_$b => ' . $b;
// D. local_$a => 100, local_$b => 200, global_$a => 10, global_$b => 200

// ********** Q10 **********
$a = 2;
$b = 3;
$c = 5;
$sum = 0;
function change($a, $b, $c) {
  $a = 100;
  global $b;
  $b = 200;
  $GLOBALS['c'] = 300;
}
change($a, $b, $c);
$sum = $a + $b + $c;
print $sum;
// E. 502

// ********** Q11 **********
$a = 0;
function checkScope($a) {
  $a += 100;
  return $a;
}

print($a . " ");
print(checkScope($a) . " ");
print($a . "\n");
// 0 100 0

// ********** Q12 **********
function getTrue() {
  print("getTrue関数を実行\n");
  return true;
}
function getFalse() {
  print("getFalse関数を実行\n");
  return false;
}

if (getTrue() || getFalse()) {
  print("評価はtrue\n");
} else {
  print("評価はfalse\n");
}
// 評価はtrue

// ********** Q13 **********
function getMax($nums) {
  $max = 0;
  for ($i = 0; $i < count($nums); $i++) {
    if ($nums[$i] > $max) {
      $max = $nums[$i];
    }
  }
  
  return $max;
}

print "入力：";
$input = trim(fgets(STDIN));
$ans = getMax(explode(",", $input));
print($ans . "\n");

// ********** Q14 **********
$a = 0;
function checkScope2($a) {
  $GLOBALS['a'] += 100;
  return $a;
}

print($a . " ");
print(checkScope2($a) . " ");
print($a . "\n");
// 0 0 100

// ********** Q15 **********
function pyramid($word, $num) {
  $str = "";
  for ($i=1; $i<=$num; $i++) {
    for ($j=0; $j<$i; $j++) {
      $str .= $word;
    }
    $str .= "\n";
  }
  return $str;
}

print "入力：";
$words = trim(fgets(STDIN));
$param = explode(",", $words);
print pyramid($param[0], $param[1]);
