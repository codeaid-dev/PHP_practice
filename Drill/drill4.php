<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $info = filter_input(INPUT_POST, 'info', FILTER_VALIDATE_INT,
                        array('options' => array('min_range' => 1,'max_range' => 31)));
    $week = array('金曜日','土曜日','日曜日','月曜日','火曜日','水曜日','木曜日');
    if ($info != null && $info != false) {
      $result = $week[$info%7];
    } else {
      $result = '1から31の数値を入力してください。';
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
    <label>2023年7月何日？<input type="text" name="info"></label><br>
    <br>
    <button type="submit">表示</button>
  </form>
  <h2>結果表示</h2>
  <?php $result = $result ?? ''; ?>
  <p><?php echo htmlspecialchars($result); ?></p>
</body>
</html>