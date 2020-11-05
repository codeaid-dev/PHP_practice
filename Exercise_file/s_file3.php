<?php
$fp = fopen('starbucks.csv', 'r');
$menu = array();
if ($fp) {
  while (!feof($fp)) {
    $menu[] = fgetcsv($fp);
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
  <table border="1">
    <tr>
    <th>メニュー</th><th>価格</th>
    </tr>
  <?php foreach ($menu as $value): ?>
    <tr>
    <?php foreach ($value as $item): ?>
      <td><?php echo $item ?></td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
</body>
</html>