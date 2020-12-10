<?php
$fp = fopen('block.csv', 'r');
$block = array();
if ($fp) {
  while (!feof($fp)) {
    $block[] = fgetcsv($fp);
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
  <style>
    .col {
      float: left;
      margin: 10px;
    }
    .row {
      clear: left;
    }
  </style>
</head>
<body>
  <h1>PHP実習</h1>
  <?php
  foreach ($block as $val) {
    print '<div class="row">';
    for ($i=0; $i<$val[3]; $i++) {
      $element = '<div class="col" style="width:'.$val[0].'px;'.'height:'.$val[1].'px;'.'background:'.$val[2].';"></div>';
      print $element;
    }
    print '</div>';
  }
  ?>
</body>
</html>