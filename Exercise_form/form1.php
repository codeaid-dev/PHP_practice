<?php
  if (!isset($_GET['page'])) {
    header('Location: form1.php?page=1');
    exit;
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
  <?php
  if (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page']>0) {
    print '<p style="font-size:40px;">ページ'.$_GET['page'].'の画面</p>';
  } else {
    print '<p style="font-size:40px;">ページが指定されていません。</p>';
  }
  ?>
</body>
</html>