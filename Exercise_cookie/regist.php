<?php
session_start();
if (isset($_SESSION['username'])) {
  header('Location: index.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    //$db = new PDO('mysql:host=localhost;dbname=exercise;charset=utf8', 'foobar', 'password'); // XAMPP/MAMP/VM
    $db = new PDO('mysql:host=mysql;dbname=exercise;charset=utf8', 'foobar', 'password'); // Docker
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    die ('エラー：'.$e->getMessage());
  }

  list($errors, $input) = validate_form();
  if ($errors) {
    show_error($errors);
  } else {
    process_form($input);
  }
} else {
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP実習</title>
</head>
<body>
  <h1>PHP実習</h1>
  <h2>ユーザー登録画面</h2>
  <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    ユーザー名：<input type="text", name="username"><br>
    パスワード：<input type="password", name="password"><br>
    <button type="submit">登録</button>
  </form>
  <p><a href="index.php">トップページへ戻る</a></p>
</body>
</html>

<?php
}

function show_error($errors = array()) {
  if ($errors) {
    print 'エラーを修正してください。<ul><li>';
    print implode('</li><li>', $errors);
    print '</li></ul>';
  }
}

function validate_form() {
  $input = array();
  $errors = array();

  $input['username'] = trim($_POST['username'] ?? '');
  $input['password'] = trim($_POST['password'] ?? '');
  if (!strlen($input['username']) || !strlen($input['password'])) {
    $errors[] = '正しいユーザー名とパスワードを設定してください。';
  }

  return array($errors, $input);
}

function process_form($input) {
  global $db;

  try {
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?,?)");
    $stmt->execute(array($input['username'], password_hash($input['password'], PASSWORD_DEFAULT)));

    print htmlspecialchars($input['username']) . "様のユーザー登録ができました。";
    print '<p><a href="index.php">トップページへ戻る</a></p>';
  } catch (PDOException $e) {
    print "ユーザー登録できませんでした。>" . $e->getMessage();
  }
}
?>
