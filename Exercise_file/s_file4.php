<?php
$fp = fopen('starbucks.csv', 'r');
$menu = array();
if ($fp) {
  while (!feof($fp)) {
    $menu[] = fgetcsv($fp);
  }
  fclose($fp);
}
foreach ($menu as $value) {
  if ($value[2] == 1) {
    $drink[] = $value;
  } else if ($value[2] == 2) {
    $food[] = $value;
  }
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
  <h2>ドリンクメニュー</h2>
  <table border="1">
    <tr>
    <th>メニュー</th><th>価格</th>
    </tr>
  <?php foreach ($drink as $val): ?>
    <tr>
    <?php for ($i=0; $i<count($val); $i++): ?>
      <?php if ($i == 2) break; ?>
      <td><?php echo $val[$i]; ?></td>
    <?php endfor; ?>
    </tr>
  <?php endforeach; ?>
  </table>

  <h2>フードメニュー</h2>
  <table border="1">
    <tr>
    <th>メニュー</th><th>価格</th>
    </tr>
  <?php foreach ($food as $val): ?>
    <tr>
    <?php for ($i=0; $i<count($val); $i++): ?>
      <?php if ($i == 2) break; ?>
      <td><?php echo $val[$i]; ?></td>
    <?php endfor; ?>
    </tr>
  <?php endforeach; ?>
  </table>
</body>
</html>