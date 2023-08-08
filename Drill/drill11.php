<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $words = mb_str_split($_POST['word'] ?? '');
    $words = array_count_values($words);
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
    <label>入力：<input type="text" name="word"></label><br>
    <br>
    <button type="submit">表示</button>
  </form>
  <h2>結果表示</h2>
  <?php if (isset($words)) : ?>
    <?php foreach ($words as $key=>$value) : ?>
      <?php echo $key.':'.$value.'個'; ?><br>
    <?php endforeach; ?>
  <?php endif; ?>
</body>
</html>