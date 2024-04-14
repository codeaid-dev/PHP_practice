<?php
session_start();
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  unset($_SESSION['username']);
  print <<<HTML
  <!DOCTYPE html>
  <html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPドリル</title>
  </head>
  <body>
    <h1>ユーザー登録とログイン</h1>
    <p>$username - ログアウトしました。</p>
    <p><a href="login.php">ログイン</a>
    <a href="signup.php" style="margin-left: 20px;">ユーザー登録</a></p>
  </body>
  </html>
  HTML;
  exit();
}
header('Location: login.php');
?>
