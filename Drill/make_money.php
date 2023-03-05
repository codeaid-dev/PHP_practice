<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $yen1 = filter_input(INPUT_POST, 'yen1', FILTER_VALIDATE_INT);
    $yen5 = filter_input(INPUT_POST, 'yen5', FILTER_VALIDATE_INT);
    if ($yen1!=null && $yen1!=false && $yen1>0 && $yen5!=null && $yen5!=false && $yen5>0) {
      $result = array();
      $total = $yen5*5+$yen1;
      for ($i=1;$i<=$total;$i++) {
        if ($i%5 <= $yen1) {
          $result[] = $i;
        }
      }
      $result = implode(', ',$result);
    } else {
      $result = '正の整数を入力してください。';
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
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <label>1円玉の枚数：<input type="text" name="yen1"></label><br>
    <label>5円玉の枚数：<input type="text" name="yen5"></label><br>
    <br>
    <button type="submit">表示</button>
  </form>
  <h2>結果表示</h2>
  <?php $result = $result ?? ''; ?>
  <p><?php echo htmlspecialchars($result); ?></p>
</body>
</html>