<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP実習</title>
  <style>
    a {
      margin: 0 20px;
    }
  </style>
</head>
<body>
  <h1>PHP実習</h1>
  <h2>トップページ</h2>
  <?php
    if (isset($_SESSION['username'])) {
      print '<p style="font-size:30px;">ようこそ　'.$_SESSION['username'].'様</p>';
      print <<<_FORM_
        <form method="POST" action="logout.php">
        <button type="submit">ログアウト</button>
        </form>
        _FORM_;
    }
  ?>
  <p><a href="login.php">ログイン</a><a href="regist.php">ユーザー登録</a></p>
</body>
</html>