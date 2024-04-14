<?php
session_start();
require_once 'config.php';

if(!isset($_SESSION['username'])){
  header('Location: login.php');
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
  <h1>ユーザー登録とログイン</h1>
  <p><?= $_SESSION['username'].'がログイン中' ?></p>
  <a href="logout.php">ログアウト</a>
</body>
</html>
