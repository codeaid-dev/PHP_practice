<?php
$filename = 'users.json';
$users = array();
if (file_exists($filename)) {
  $json = file_get_contents($filename);
  $users = json_decode($json,true);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'] ?? '';
  if (in_array($username, array_keys($users))) {
    $error = '登録済みのユーザーです。';
  } else {
    $email = $_POST['email'] ?? '';
    if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email) === 1) {
      $success = '登録しました。';
      $users[$username] = $email;
      $json = json_encode($users);
      file_put_contents($filename, $json);
    } else {
      $error = '無効なメールアドレスです。';
    }
  }
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
  <h2>ユーザー登録</h2>
  <?php if (isset($error)) { ?>
    <p style="color:red;"><?php echo $error; ?></p>
  <?php } ?>
  <form method="POST">
    <p><label>ユーザー名：<input type="text" name="username" required></label></p>
    <p><label>メールアドレス：<input type="text" name="email" required></label></p>
    <p><button type="submit">登録</button>
  </form>
  <?php if (isset($success)) { ?>
    <p><?php echo $success; ?></p>
  <?php } ?>
</body>
</html>