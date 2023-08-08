<?php
  if (!isset($_GET['page'])) {
    header('Location: pages.php?page=1');
    exit;
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
  <p style="font-size:40px;">ページ<?php echo $_GET['page'] ?>の画面</p>
  <?php for ($i=1; $i<=5; $i++) { ?>
    <?php if ($i != $_GET['page']) { ?>
      <span style="margin:5px;"><a href="pages.php?page=<?= $i ?>"><?= $i ?></a></span>
    <?php } else { ?>
      <span style="margin:5px;"><?= $i ?></span>
    <?php } ?>
  <?php } ?>
</body>
</html>