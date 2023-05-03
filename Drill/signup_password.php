<?php
$filename = 'users.json';
$users = array();
if (file_exists($filename)) {
  $json = file_get_contents($filename);
  $users = json_decode($json,true);
}
$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'] ?? '';
  if (in_array($username, array_keys($users))) {
    $errors[] = '登録済みのユーザーです';
  }
  $email = $_POST['email'] ?? '';
  if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email) !== 1) {
    $errors[] = '無効なメールアドレスです。';
  }
  $password = $_POST['password'] ?? null;
  if (preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[!-\/:-@[-`{-~])[!-~]{8,32}$/', $password) !== 1) {
      $errors[] = 'パスワードは8~32文字で大小文字英字数字記号をそれぞれ1文字以上含める必要があります。';
  }
  if (count($errors) == 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $users[$username] = array($email,$password);
    $json = json_encode($users);
    file_put_contents($filename, $json);
    $success = '登録しました。';
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
  <?php if ($errors) { ?>
    <ul style="color:red;">
    <?php foreach ($errors as $error) { ?>
      <li><?php echo $error; ?></li>
    <?php } ?>
    </ul>
  <?php } ?>
  <form method="POST">
    <p><label>ユーザー名：<input type="text" name="username" required></label></p>
    <p><label>メールアドレス：<input type="text" name="email" required></label></p>
    <p><label>パスワード：<input type="text" name="password" required></label></p>
    <p><button type="submit">登録</button>
  </form>
  <?php if (isset($success)) { ?>
    <p><?php echo $success; ?></p>
  <?php } ?>
</body>
</html>