<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = $_POST['info'] ?? '';
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
    <label>入力：<input type="text" name="info"></label><br>
    <br>
    <button type="submit">表示</button>
  </form>
  <h2>結果表示</h2>
  <?php $result = $result ?? ''; ?>
  <p><?php echo htmlspecialchars($result); ?></p>
</body>
</html>