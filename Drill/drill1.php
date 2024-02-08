<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u = rand(1,10);
    if ($u==1) {
      $result = '今日は最高！';
    } else if ($u>=2 && $u<=4) {
      $result = '今日はそこそこです';
    } else if ($u>=5 && $u<=8) {
      $result = '今日はまぁまぁ';
    } else {
      $result = '今日は最悪・・・';
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
    <button type="submit">占う</button>
  </form>
  <h2>結果表示</h2>
  <?php if (isset($result)) : ?>
    <p><?php echo $result; ?></p>
  <?php endif; ?>
</body>
</html>