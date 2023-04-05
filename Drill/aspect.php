<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $width = filter_input(INPUT_POST, 'width', FILTER_VALIDATE_INT);
  $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_INT);
  if (empty($width) || empty($height)) {
    $error = '横と縦のサイズは整数を入力してください。';
  } else {
    $g = gcd($width, $height);
    $rw = $width / $g;
    $rh = $height / $g;
  }
}
function gcd($a, $b) {
  if ($b == 0) return $a;
  return gcd($b, $a%$b);
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
  <h2>サイズ</h2>
  <?php if (isset($error)) : ?>
    <p><?= $error ?></p>
  <?php endif; ?>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <label>横：<input type="text" name="width" value="<?= $width ?? '' ?>" required></label><br>
    <label>縦：<input type="text" name="height" value="<?= $height ?? '' ?>" required></label><br>
    <br>
    <button type="submit">計算</button>
  </form>
  <h2>アスペクト比</h2>
  <?php if (isset($rw) && isset($rh)) : ?>
    <p><?= $rw ?>:<?= $rh ?></p>
  <?php endif; ?>
</body>
</html>