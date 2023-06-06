<?php
  $dsn = 'mysql:host=mysql;dbname=productdb';
  $user = 'root';
  $password = 'password';

  $products = array();

  try {
    //$db = new PDO("sqlite:./db/product.db");
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    if (isset($_POST['submit'])) {
      $product = $_POST['product'];
      $price = $_POST['price'];
      $stmt = $db->prepare("INSERT INTO products (product, price) VALUES (:product, :price)");
      $stmt->bindParam(':product', $product, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->execute();
      $info = $product . 'を' .  . '個注文しました。';
    }

    $q = $db->query("SELECT * FROM oder");
    while ($row = $q->fetch()) {
      $work=array();
      $work['id'] = $row['id'];
      $work['product'] = $row['product'];
      $work['price'] = $row['price'];
      $products[] = $work;
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
  <link href="css/style.css" rel="stylesheet">
  <title>PHPドリル</title>
</head>
<body>
  <h1>データベース②</h1>
  <?php if (isset($info)) {
    print '<p>' . $info . '</p>';
  } ?>
  <form method="POST">
    <p><label>製品名：<input type="text" name="product" required></label><br>
    <label>価格(円)：<input type="number" name="price" required></label></p>
    <button type="submit" name="submit">登録</button>
  </form>
  <hr>
  <p>製品一覧</p>
  <?php if (!empty($products)) { ?>
    <table border="1">
      <thead>
        <tr>
          <th>番号</th>
          <th>製品</th>
          <th>価格(円)</th>
          <th>処理</th>
        </tr>
      </thead>
      <tbody>
        <form method="POST">
        <?php foreach ($products as $p) {
          print '<tr><td>' . $p['id'] . '</td>';
          print '<td>' . $p['product'] . '</td>';
          print '<td>' . $p['price'] . '</td>';
          print '<td>';
          print '<input type="checkbox" name="id" value="' . $p['id'] . '">';
          print '<label><input type="number" min="1" max="5" name="' . $p['product'].$p['id'] . '" value="1" style="margin-left:5px;">個</label>';
          print '</td></tr>';
        } ?>
        <button type="submit" name="oder">注文</button>
      </tbody>
    </table>
  <?php } else { ?>
    <p>何も注文がありません。</p>
  <?php } ?>
</body>
</html>