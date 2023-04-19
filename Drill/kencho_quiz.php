<?php
$fp = fopen('kencho.csv', 'rb');
$kencho = array();
while ((!feof($fp)) && ($info = fgetcsv($fp))) {
  $kencho[] = $info;
}
fclose($fp);
$question = array_combine($kencho[0],$kencho[1]);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $answer = $_POST['answer'] ?? '';
  $q = $_POST['question'];
  $right = $question[$q];
  if ($answer == $right) {
    $result = "正解！";
  } else {
    $result = "不正解（正解は".$right."です）";
  }
} else {
  $q = array_rand($question);
  $answer = '';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHPドリル</title>
</head>
<body>
  <h1>県庁所在地クイズ</h1>
  <p>問題：<?= $q ?>の県庁所在地は？</p>
  <form method="POST">
    <input type="hidden" name="question" value="<?= $q ?>">
    <label>答え：<input type="text" name="answer" value="<?= $answer ?>"></label><br>
    <br>
    <button type="submit">解答</button>
  </form>
  <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>"><button style="margin-top: 10px;">次の問題</button></a>
  <h2>結果表示</h2>
  <?php $result = $result ?? ''; ?>
  <p><?php echo htmlspecialchars($result); ?></p>
</body>
</html>