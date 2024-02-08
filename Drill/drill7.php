<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $info = filter_input(INPUT_POST, 'info', FILTER_VALIDATE_INT);
    $result = array();
    if ($info!=null && $info!=false && $info>0) {
      for ($i=0;$i<$info;$i++) {
        $result[] = $i*2+$info;
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
  <form method="POST">
    <label>入力：<input type="text" name="info"></label><br>
    <br>
    <button type="submit">表示</button>
  </form>
  <h2>結果表示</h2>
  <?php $result = $result ?? ''; ?>
  <p><?php echo $result; ?></p>
</body>
</html>