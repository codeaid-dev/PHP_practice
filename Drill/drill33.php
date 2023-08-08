<?php
  $dsn = 'mysql:host=localhost;dbname=usersdb';
  $user = 'root';
  $password = '';

  try {
    //$db = new PDO("sqlite:./db/users.db");
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->exec("CREATE TABLE IF NOT EXISTS users(
              username VARCHAR(256) PRIMARY KEY,
              email VARCHAR(256),
              password VARCHAR(256))");

    $errors = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['username'] ?? '';
      $stmt = $db->prepare("SELECT * FROM users WHERE username=:username");
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
      $stmt->execute();
      if ($stmt->fetch()) {
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
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $success = '登録しました。';
      }
    }
  } catch (PDOException $e) {
    die ('エラー：'.$e->getMessage());
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
    <p><button type="submit" name="submit">登録</button>
  </form>
  <?php if (isset($success)) { ?>
    <p><?php echo $success; ?></p>
  <?php } ?>
</body>
</html>