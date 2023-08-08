<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $yoko = filter_input(INPUT_POST, 'yoko', FILTER_VALIDATE_INT);
    $tate = filter_input(INPUT_POST, 'tate', FILTER_VALIDATE_INT);
    $result = '';
    if ($yoko!=null && $yoko!=false && $tate!=null && $tate!=false && $yoko>0 && $tate>0) {
      for ($y=0;$y<$tate;$y++) {
        for ($x=0;$x<$yoko;$x++) {
          if (($y%2==0 && $x%2==0) || ($y%2==1 && $x%2==1)) {
            $result .= '○';
          } else {
            $result .= '✕';
          }
        }
        $result .= '<br>';
      }
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
    <label>横の数：<input type="text" name="yoko"></label><br>
    <label>縦の数：<input type="text" name="tate"></label><br>
    <br>
    <button type="submit">表示</button>
  </form>
  <h2>結果表示</h2>
  <?php $result = $result ?? ''; ?>
  <p><?php echo $result; ?></p>
</body>
</html>