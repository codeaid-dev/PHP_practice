// Webフォーム　解答例
// ********** Q1 **********
A,C
// ********** Q2 **********
D
// ********** Q3 **********
B
// ********** Q4 **********
C
// ********** Q5 **********
D
// ********** Q6 **********
B
// ********** Q7 **********
A,E
// ********** Q8 **********
A
<?php
// ********** Q9 **********
foreach ($_GET as $key => $value) {
  echo 'キー：'.$key.'<br>';
  echo '値：'.$value.'<br><br>';
}
?>

<?php
// ********** Q10 **********
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $comment = htmlspecialchars($_POST["comment"], ENT_QUOTES, "UTF-8");
  print($comment);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入力内容表示</title>
</head>
<body>
  <h1>入力内容表示</h1>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <input type="text" name="comment">
    <button type="submit">送信</button>
  </form>
</body>
</html>

<?php
// ********** Q11 **********
function leap_year_check($year) {
  if ($year % 4 == 0) {
    if ($year % 100 != 0 || $year % 400 == 0) {
      return true;
    } else {
      return false;
    }
  }
  return false;
}

$year = filter_input(INPUT_GET, "year", FILTER_VALIDATE_INT);
?>

<!DOCTYPE html>
<title>閏年判定</title>
<h1>閏年判定</h1>

<?php if (empty($year)): ?>
  <p>判定する年を入力してください</p>
  <form action="leap_year_check.php" method="get">
    <label>判定年：
    <input name="year" type="number" value="<? echo htmlentities(date("Y"), ENT_QUOTES, "UTF-8") ?>">
    </label>
    <button type="submit">送信</button>
  </form>
<?php else: ?>
  <p><? echo htmlentities($year, ENT_QUOTES, "UTF-8") ?>年は</p>
  <?php if (leap_year_check($year)): ?>
    <p>閏年です</p>
  <?php else: ?>
    <p>平年です</p>
  <?php endif; ?>
<?php endif; ?>