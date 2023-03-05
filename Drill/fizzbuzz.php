<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = '';
    $info = filter_input(INPUT_POST, 'info', FILTER_VALIDATE_INT);
    if (!is_null($info) && $info !== false && $info>0) {
      for ($i=1;$i<=$info;$i++) {
        if ($i%15==0) {
          $result .= 'FizzBuzz';
        } else if ($i%3==0) {
          $result .= 'Fizz';
        } else if ($i%5==0) {
          $result .= 'Buzz';
        } else {
          $result .= $i;
        }
        $result .= ' ';
      }
    } else {
      $result = '入力値は正の整数ではありません。';
    }
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FizzBuzz問題</title>
</head>
<body>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <label>入力：<input type="text" name="info"></label><br>
    <br>
    <button type="submit">表示</button>
  </form>
  <h2>結果表示</h2>
  <?php $result = $result ?? ''; ?>
  <p><?php echo htmlspecialchars($result); ?></p>
</body>
</html>