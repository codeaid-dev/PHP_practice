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

    if (isset($_GET['customer'])) {
      $customer = $_GET['customer'];
      $stmt = $db->prepare("SELECT * FROM oder WHERE customer=:customer");
      $stmt->bindParam(':customer', $customer, PDO::PARAM_STR);
      $stmt->execute();
      while ($row = $stmt->fetch()) {
        $work=array();
        $work['quantity'] = $row['quantity'];
        $products[$row['pid']] = $work;
      }

      foreach ($products as $pid => $value) {
        $stmt = $db->prepare("SELECT * FROM products WHERE id=:id");
        $stmt->bindParam(':id', $pid, PDO::PARAM_INT);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
          $products[$pid]['product'] = $row['product'];
          $products[$pid]['price'] = $row['price'];
        }
      }
    }

    if (isset($_POST['delete'])) {
      $customer = $_POST['customer'];
      $stmt = $db->prepare("DELETE FROM oder WHERE customer=:customer");
      $stmt->bindParam(':customer', $customer, PDO::PARAM_STR);
      $stmt->execute();
      header('Location: index.php');
      exit;
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
  <h2>注文確認</h2>
  <?php if (isset($_GET['customer'])) {
    print '<p>名前：' . $_GET['customer'] . '</p>';
    $total_price = 0;
    foreach ($products as $product) {
      $total_price += $product['price']*$product['quantity']; ?>
      <?= $product['product'] ?> (<?= $product['price'] ?>円) x <?= $product['quantity'] ?>個<br>
    <?php } ?>
    合計: <?= $total_price*1.1 ?>円(税込)<br>
    <form method="POST">
      <input type="hidden" name="customer" value="<?= $_GET['customer'] ?>">
      <p><button type="submit" name="delete">注文を消去しトップへ戻る</button></p>
    </form>
  <?php } ?>
</body>
</html>