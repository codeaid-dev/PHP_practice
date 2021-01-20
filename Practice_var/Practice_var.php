<?php
// テキストと数の操作　解答例
// ********** Q1 **********
$a = 1;
$b = 2;
$c = "1";
$d = "2";

print($a + $b + $c . " "); // 4
print($a . $b . $c . " "); // 121
print($c + $d . "\n"); // 3

// ********** Q2 **********
$a = 0;
$b = $a++;
$c = ++$a;
print($b . " "); // 0
print($c . "\n"); // 2

// ********** Q3 **********
// 「C」

// ********** Q4 **********
// 「B」
// A. strlen()は文字列の長さを調べる
// B. substr()は文字列の一部を取り出す
// C. str_replace()は一部の文字列を置き換える
// D. trim()は文字列の前後の空白を取り除く

// ********** Q5 **********
// 「B」strtolower()ですべて小文字にしてから、
// ucwords()で空白で区切られた文字列の先頭を大文字にする

// ********** Q6 **********
// 「D」文字列のインデックス1から5文字なので、
// 2文字目から「bcdef」となる

// ********** Q7 **********
// 「D」1 * 8は8、.(ピリオド)は文字列の連結
// 3 * 4は12、なので8と12が連結されて812となる

// ********** Q8 **********
// 「C」文字列の長さを調べるのはstrlen()

// ********** Q9 **********
$num = "4982-2975-6028";
print 'カード番号：***' . substr($num, -4, 4);
// カード番号：***6028

// ********** Q10 **********
$radius = 23;
$pi = 3.14;
printf('半径%dcmの円の円周は、%.2fcmです。', $radius, $radius * 2 * $pi);

// ********** Q11 **********
$n = 1;
$p = 2;
print "$n, $p\n";
$n++;
$p *= 2;
print "$n, $p\n";
$n++;
$p *= 2;
print "$n, $p\n";
$n++;
$p *= 2;
print "$n, $p\n";
$n++;
$p *= 2;
print "$n, $p\n";
$n++;
$p *= 2;
print "$n, $p\n";
$n++;
$p *= 2;
print "$n, $p\n";
$n++;
$p *= 2;
print "$n, $p\n";

// ********** Q12 **********
$str = "目の前に突然{monster}が現れた。\nびっくりして{monster}は逃げていった。";
$monster = "スライム";
print str_replace('{monster}', $monster, $str);

// ********** Q13 **********
$food = "カレー";
print "今日の{$food}は最高に美味かった！";

// ********** Q14 **********
print "半角英数字：";
$str = trim(fgets(STDIN));
print "結果表示：" . str_replace(" ", "", $str);

// ********** Q15 **********
$num = 9;
printf("%04d\n",$num);
printf("%03d%d\n",$num,$num);
printf("%02d%d%d\n",$num,$num,$num);
printf("%d%d%d%d\n",$num,$num,$num,$num);

// ********** Q16 **********
print "半角英字入力：";
$str = trim(fgets(STDIN));
$str = ucwords(strtolower($str));
print "大文字表示：" . $str;

// ********** Q17 **********
print "体重は？";
$weight = trim(fgets(STDIN));
print "身長は？";
$tall = trim(fgets(STDIN));
$bmi = $weight / (($tall/100) ** 2);
$jst = (($tall/100) ** 2) * 22;
printf("体重は%dkgで身長が%dcmのBMIは%.2fです。\n", $weight, $tall, $bmi);
printf("身長が%dcmの適正体重は%.2fkgです。\n", $tall, $jst);
// 体重は60で身長が170cmのBMIは20.76です。
// 身長が170cmの適正体重は63.58kgです。

// ********** Q18 **********
print "ゲーム名は？";
$game = trim(fgets(STDIN));
print "発売日は？";
$date = trim(fgets(STDIN));
print "価格は？";
$price = trim(fgets(STDIN));
$tax = 1.1;
$tax_price = $price * $tax;
printf("ゲーム：%s\n", $game);
printf("発売日：%s\n", $date);
printf("価格：%d円(税込%d円)\n", $price, $tax_price);
