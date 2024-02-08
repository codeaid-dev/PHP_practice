<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $str = $_POST['str'] ?? '';
    $reverse = '';
    $length = mb_strlen($str);
    for ($i=$length-1; $i>=0; $i--) {
      $reverse .= mb_substr($str,$i,1);
    }
    if ($str==$reverse) {
      $result = "「{$str}」は回文です。";
    } else {
      $result = "「{$str}」は回文ではありません。";
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
    <label>入力：<input type="text" name="str"></label><br>
    <br>
    <button type="submit">判定</button>
  </form>
  <h2>結果表示</h2>
  <?php $result = $result ?? ''; ?>
  <p><?php echo htmlspecialchars($result); ?></p>
</body>
</html>