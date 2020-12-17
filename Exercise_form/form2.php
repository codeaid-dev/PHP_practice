<?php
  if (!isset($_GET['page'])) {
    header('Location: form2.php?page=1');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP実習</title>
  <style>
  span {
    margin: 5px;
  }
  </style>
</head>
<body>
  <h1>PHP実習</h1>
  <?php
  if (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page']>0 && $_GET['page']<=5) {
    print '<p style="font-size:40px;">ページ'.$_GET['page'].'の画面</p>';
  } else {
    print '<p style="font-size:40px;">ページが指定されていません。</p>';
  }
  print '<p>';
  for ($i=1; $i<=5; $i++) {
    if ($_GET['page'] != $i) {
      print '<span><a href="form2.php?page=' . $i . '">' . $i . '</a></span>';
    } else {
      print '<span>'.$i.'</span>';
    }
  }
  print '</p>';
  ?>
</body>
</html>
