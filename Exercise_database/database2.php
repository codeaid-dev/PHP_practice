<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  list($errors, $input) = validate_form();
  if ($errors) {
    print 'これらのエラーを修正してください。<ul><li>';
    print implode('</li><li>', $errors);
    print '</li></ul>';
    exit();
  } else {
    $isbn = htmlspecialchars($_POST['isbn']);
    $name = htmlspecialchars($_POST['name']);
    $price = $input['price'];
    $page = $input['page'];
    $date = htmlspecialchars($_POST['date']);
  }

  //$dsn = 'mysql:host=localhost;dbname=bookstore;charset=utf8'; // XAMPP/MAMP/VMの場合
  //$dsn = 'mysql:host=mysql;dbname=bookstore;charset=utf8'; // Dockerの場合
  $dsn = 'sqlite:./bookstore.db'; // SQLiteの場合
  $user = 'bookadmin';
  $password = 'password';

  try {
    //$db = new PDO($dsn, $user, $password);
    $db = new PDO($dsn); //SQLiteの場合
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare("INSERT INTO books (isbn, name, price, page, date) VALUES (:isbn, :name, :price, :page, :date)");
    $stmt->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':page', $page, PDO::PARAM_INT);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->execute();

    print '<p>登録できました。</p>';
  } catch (PDOException $e) {
    die ('エラー：'.$e->getMessage());
  }
}

function validate_form() {
  $input['isbn'] = filter_input(INPUT_POST, 'isbn', FILTER_VALIDATE_INT);
  $input['price'] = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
  $input['page'] = filter_input(INPUT_POST, 'page', FILTER_VALIDATE_INT);
  $errors = array();
  if (empty($input['isbn'])) {
    $errors[] = 'ISBNは数字で入力してください。';
  }
  if (empty($_POST['name'])) {
    $errors[] = '書籍名を入力してください。';
  }
  if (empty($input['price'])) {
    $errors[] = '価格は数字を入力してください。';
  }
  if (empty($input['page'])) {
    $errors[] = 'ページ数は数字を入力してください。';
  }
  if (empty($_POST['date'])) {
    $errors[] = '発売日を入力してください。';
  }

  return array($errors, $input);
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
  <h1>PHP実習</h1>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <p><label>ISBN：<input type="text" name="isbn"></label></p>
    <p><label>書籍名：<input type="text" name="name"></label></p>
    <p><lave>価格：<input type="text" name="price"></lave></p>
    <p><lave>ページ数：<input type="text" name="page"></lave></p>
    <p><lave>発売日：<input type="date" name="date"></lave></p>
    <button type="submit">登録</button>
  </form>
</body>
</html>