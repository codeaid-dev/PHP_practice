<?php
session_start();

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($password == '1234') {
    $_SESSION['username'] = $username;
  } else {
    $error = 'ログイン失敗';
  }
} else if (isset($_POST['logout']) && isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  unset($_SESSION['username']);
  $logout = 'ログアウトしました。';
} else if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
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
  <h1>ログインとセッション</h1>
  <?php
  if (isset($error)) {
    print '<p>'.$error.'</p>';
  }
  ?>
  <?php if (!isset($_SESSION['username'])) {
    if (isset($logout)) {
      print $username . ' ' . $logout;
    } ?>
    <form method="POST">
      <p><label>ユーザー名：<input type="text" name="username" required></label><br>
      <label>パスワード：<input type="password" name="password" required></label></p>
      <p><button type="submit" name="login" style="margin-right:10px">ログイン</button></p>
    </form>
  <?php } else {
    print '<p>' . $username . ' ログイン中です。</p>';
    print '<form method="POST">';
    print '<button type="submit" name="logout">ログアウト</button>';
    print '</form>';
  } ?>
</body>
</html>