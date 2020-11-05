<?php
$fp = fopen("menu.txt", "r");
$menu = array();
if ($fp) {
  while (!feof($fp)) {
    $menu[] = fgets($fp);
  }
  fclose($fp);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP実習</title>
</head>
<body>
  <h1>PHP実習</h1>
  <?php foreach ($menu as $key => $value): ?>
    <?php if ($key == 0): ?>
      <h2><?php echo $value ?></h2>
      <ul>
    <?php else: ?>
      <li><?php echo $value ?></li>
    <?php endif; ?>
  <?php endforeach; ?>
  </ul>
</body>
</html>