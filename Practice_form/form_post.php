<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $comment = htmlspecialchars($_POST["comment"], ENT_QUOTES, "UTF-8");
  print($comment);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入力内容表示</title>
</head>
<body>
  <h1>入力内容表示</h1>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <input type="text" name="comment">
    <button type="submit">送信</button>
  </form>
</body>
</html>