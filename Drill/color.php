<?php
$red = false;
$green = false;
$blue = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $colors = $_POST['colors'] ?? [];
  if (in_array("red", $colors)) {
    $red = true;
  }
  if (in_array("green", $colors)){
    $green = true;
  }
  if (in_array("blue", $colors)){
    $blue = true;
  }
  if ($red && $green && $blue) {
    $result = "白";
  } else if ($red && $green) {
    $result = "黄";
  } else if ($red && $blue) {
    $result = "マゼンタ";
  } else if ($blue && $green) {
    $result = "シアン";
  } else if ($red) {
    $result = "赤";
  } else if ($green) {
    $result = "緑";
  } else if ($blue) {
    $result = "青";
  } else {
    $result = "黒";
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
    <p><label><input type="checkbox" name="colors[]" value="red" <?php echo $red ? 'checked' : '' ?>>赤</label>
    <label><input type="checkbox" name="colors[]" value="green" <?php echo $green ? 'checked' : '' ?>>緑</label>
    <label><input type="checkbox" name="colors[]" value="blue" <?php echo $blue ? 'checked' : '' ?>>青</label></p>
    <p><button type="submit">作れる色</button><p>
  </form>
  <h2>結果表示</h2>
  <?php if (isset($result)) { ?>
    <p>作れる色は：<?php echo $result; ?><p>
  <?php } ?>
</body>
</html>