<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bottom = filter_input(INPUT_POST, 'bottom');
    $height = filter_input(INPUT_POST, 'height');
    $top = filter_input(INPUT_POST, 'top');
    $radius = filter_input(INPUT_POST, 'radius');
    $area = $_POST['area'] ?? 1;
    if ($area == 1) { // 四角形
      if (empty($bottom) || !is_numeric($bottom) || empty($height) || !is_numeric($height)) {
        $error = '数字を入力してください。';
      } else {
        $result = '四角形の面積は'.($bottom * $height);
      }
    } else if ($area == 2) { // 三角形
      if (empty($bottom) || !is_numeric($bottom) || empty($height) || !is_numeric($height)) {
        $error = '数字を入力してください。';
      } else {
        $result = '三角形の面積は'.($bottom * $height / 2);
      }
    } else if ($area == 3) { // 台形
      if (empty($bottom) || !is_numeric($bottom) || empty($height) || !is_numeric($height) || empty($top) || !is_numeric($top)) {
        $error = '数字を入力してください。';
      } else {
        $result = '台形の面積は'.(($top + $bottom) * $height / 2);
      }
    } else if ($area == 4) { // 円
      if (empty($radius) || !is_numeric($radius)) {
        $error = '数字を入力してください。';
      } else {
        $result = '円の面積は'.($radius * $radius * 3.14);
      }
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
  <h2>面積の計算</h2>
  <?php if (isset($error)) : ?>
    <p><?= $error ?></p>
  <?php endif; ?>
  <form method="POST">
    <label>底辺：<input type="text" name="bottom" value="<?= $bottom ?? '' ?>">cm</label><br>
    <label>高さ：<input type="text" name="height" value="<?= $height ?? '' ?>">cm</label><br>
    <label>上底：<input type="text" name="top" value="<?= $top ?? '' ?>">cm</label><br>
    <label>半径：<input type="text" name="radius" value="<?= $radius ?? '' ?>">cm</label><br>
    <p>*円周率は3.14で計算します。</p>
    <label><input type="radio" name="area" value="1" checked>四角形</label>
    <label><input type="radio" name="area" value="2">三角形</label>
    <label><input type="radio" name="area" value="3">台形</label>
    <label><input type="radio" name="area" value="4">円</label><br>
    <br>
    <button type="submit">計算</button>
  </form>
  <h2>面積</h2>
  <?php if (isset($result)) : ?>
    <p><?php echo $result; ?>cm<sup>2</sup></p>
  <?php endif; ?>
</body>
</html>