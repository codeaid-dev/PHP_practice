<?php
  require_once 'config.php';
  session_start();
  $products = array();

  try {
    if (isset($_POST['oder']) && isset($_SESSION['cart']) && isset($_SESSION['customer'])) {
      $customer = $_SESSION['customer'];
      foreach ($_SESSION['cart'] as $id => $value) {
        $quantity = $value['quantity'];
        $stmt = $db->prepare("INSERT INTO oder (customer, pid, quantity) VALUES (:customer, :pid, :quantity)");
        $stmt->bindParam(':customer', $customer, PDO::PARAM_STR);
        $stmt->bindParam(':pid', $id, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->execute();
      }
      unset($_SESSION['cart']);
      unset($_SESSION['customer']);
      header('Location: result.php?customer='.$customer);
      exit;
      //$info = '注文を完了しました。<br><a href="result.php?customer=' . $customer . '">注文履歴</a>';
    }

    $q = $db->query("SELECT * FROM products");
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

  if (isset($_POST['add_to_cart'])) {
    $_SESSION['customer'] = $_POST['customer'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $ids = $_POST['id'];
    foreach ($ids as $id) {
      $quantity = $_POST['quantity'.$id];
      $product = $_POST['product'.$id];
      $price = $_POST['price'.$id];
      if (empty($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] = $quantity;
        $_SESSION['cart'][$id]['product'] = $product;
        $_SESSION['cart'][$id]['price'] = $price;
      } else {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
      }
    }
  }
  if (isset($_POST['del_from_cart'])) {
    unset($_SESSION['cart']);
    unset($_SESSION['customer']);
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
  <h2>注文画面</h2>
  <?php if (isset($info)) {
    print '<p>' . $info . '</p>';
  } ?>
  <?php if (!empty($products)) { ?>
    <form method="POST">
      <?php if (isset($_SESSION['customer'])) { ?>
        <p><label>名前：<input type="text" name="customer" value="<?= $_SESSION['customer'] ?>" readonly></label></p>
      <?php } else { ?>
        <p><label>名前：<input type="text" name="customer" required></label></p>
      <?php } ?>
      <table border="1">
        <thead>
          <tr>
            <th>番号</th>
            <th>製品</th>
            <th>価格(円)</th>
            <th>購入</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $p) {
            print '<tr><td>' . $p['id'] . '</td>';
            print '<td>' . $p['product'] . '</td>';
            print '<td>' . $p['price'] . '</td>';
            print '<td>';
            print '<input type="checkbox" name="id[]" value="' . $p['id'] . '">';
            print '<label><input type="number" min="1" max="5" name="quantity' . $p['id'] . '" value="1" style="margin-left:5px;">個</label>';
            print '<input type="hidden" name="product' . $p['id'] . '" value="' . $p['product'] . '">';
            print '<input type="hidden" name="price' . $p['id'] . '" value="' . $p['price'] . '">';
            print '</td></tr>';
          } ?>
        </tbody>
      </table>
      <br>
      <button type="submit" name="add_to_cart">カートに追加</button>
    </form>
  <?php } else { ?>
    <p>製品の登録がありません。</p>
  <?php } ?>
  <h2>カート</h2>
  <?php if (isset($_SESSION['cart']) && isset($_SESSION['customer'])) { ?>
    <p>名前：<?= $_SESSION['customer'] ?></p>
    <?php $total_price = 0;
    foreach ($_SESSION['cart'] as $product) {
      $total_price += $product['price']*$product['quantity']; ?>
      <?= $product['product'] ?> (<?= $product['price'] ?>円) x <?= $product['quantity'] ?>個<br>
    <?php } ?>
    合計: <?= $total_price*1.1 ?>円(税込)<br>
    <form method="POST">
      <p><button type="submit" name="oder" style="margin-right:10px;">注文</button>
      <button type="submit" name="del_from_cart">カートを空にする</button></p>
    </form>
  <?php } else { ?>
    <p>カートに製品はありません。</p>
  <?php } ?>
</body>
</html>