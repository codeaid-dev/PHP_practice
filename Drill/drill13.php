<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num = filter_input(INPUT_POST, 'num', FILTER_VALIDATE_INT,
                        array('options' => array('min_range' => 1,'max_range' => 99)));
    if ($num!=null && $num!=false) {
      $result = '';
      for ($i=1;$i<=$num;$i++) {
        if ($i > $num/$i) break;
        if ($num % $i == 0) $result .= $i."x".intval($num/$i)."=".$num." ";
      }
    } else {
      $result = '1~99の整数を入力してください。';
    }
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
  <form method="POST">
    <label>答え：<input type="text" name="num"></label><br>
    <br>
    <button type="submit">表示</button>
  </form>
  <h2>結果表示</h2>
  <?php $result = $result ?? ''; ?>
  <p><?php echo htmlspecialchars($result); ?></p>
</body>
</html>