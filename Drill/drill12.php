<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $red = filter_input(INPUT_POST, 'red', FILTER_VALIDATE_INT);
    $blue = filter_input(INPUT_POST, 'blue', FILTER_VALIDATE_INT);
    $white = filter_input(INPUT_POST, 'white', FILTER_VALIDATE_INT);
    if ($red !== false && $red >= 0 &&
        $blue !== false && $blue >= 0 &&
        $white !== false && $white >= 0) {
//    if (is_numeric($red) && $red >= 0 &&
//        is_numeric($blue) && $blue >= 0 &&
//        is_numeric($white) && $white >= 0) {
      $result = '紫色のボールは'.min(intval(($red+$blue+$white)/2),($red+$white),($blue+$white)).'個';
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
    <label>赤色：<input type="text" name="red"></label><br>
    <label>青色：<input type="text" name="blue"></label><br>
    <label>白色：<input type="text" name="white"></label><br>
    <br>
    <button type="submit">表示</button>
  </form>
  <h2>結果表示</h2>
  <?php if (isset($red) && isset($blue) && isset($white)) : ?>
    <p><?= '赤色：'.$red.'　青色：'.$blue.'　白色：'.$white ?></p>
  <?php endif; ?>
  <?php $result = $result ?? ''; ?>
  <p><?php echo htmlspecialchars($result); ?></p>
</body>
</html>