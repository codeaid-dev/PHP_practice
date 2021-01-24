<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $keyword = htmlspecialchars($_POST['keyword']);
  if (!isset($keyword)) {
    header('Location: database3.php');
    exit();
  }

  //$dsn = 'mysql:host=localhost;dbname=bookstore;charset=utf8'; // XAMPP/MAMP/VMの場合
  $dsn = 'mysql:host=mysql;dbname=bookstore;charset=utf8'; // Dockerの場合
  $user = 'bookadmin';
  $password = 'password';

  try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare("
    SELECT * FROM books WHERE isbn=:isbn OR name LIKE :name");
    $stmt->bindParam(':isbn', $keyword, PDO::PARAM_STR);
    $name = "%".$keyword."%";
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
  } catch (PDOException $e) {
    die ('エラー：'.$e->getMessage());
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP実習</title>
</head>
<body>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <p><label>ISBNもしくは書籍名：<input type="text" name="keyword"></label></p>
    <p><button type="submit">表示</button></p>
  </form>
  <hr>
  <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
  <?php while ($row = $stmt->fetch()): ?>
  <p>ISBN：<?= htmlspecialchars($row['isbn']) ?></p>
  <p>書籍名：<?= htmlspecialchars($row['name']) ?></p>
  <p>価格：<?= htmlspecialchars($row['price']) ?>円（税抜）</p>
  <p>ページ数：<?= htmlspecialchars($row['page']) ?></p>
  <p>発売日：<?= htmlspecialchars($row['date']) ?></p>
  <br>
  <?php endwhile; ?>
  <?php endif; ?>
</body>
</html>