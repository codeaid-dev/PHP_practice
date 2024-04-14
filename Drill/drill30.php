<?php
session_start();
$products = [
  ['name' => '商品1', 'price' => 1000, 'quantity' => 0],
  ['name' => '商品2', 'price' => 2000, 'quantity' => 0],
  ['name' => '商品3', 'price' => 3000, 'quantity' => 0]
];

if (isset($_POST['add_to_cart'])) {
  if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
  }
  $product_id = $_POST['product_id'] ?? [];
  foreach ($product_id as $id) {
    $products[$id]['quantity'] = $_POST['quantity'.$id];
    if (empty($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id] = $products[$id];
    } else {
      $_SESSION['cart'][$id]['quantity'] += $products[$id]['quantity'];
    }
  }
}

if (isset($_POST['del_from_cart'])) {
  unset($_SESSION['cart']);
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
  <h1>ショッピングカート</h1>

  <h2>商品一覧</h2>
  <form method="POST">
    <?php foreach ($products as $id => $product) { ?>
      <label>
        <input type="checkbox" name="product_id[]" value="<?= $id ?>">
        <?= $product['name'] ?> (<?= $product['price'] ?>円)
      </label>
      <label><input type="number" name="quantity<?= $id ?>" min="1" max="10" value="1">個</label>
      <br>
    <?php } ?>
    <p><button type="submit" name="add_to_cart">カートに追加</button></p>
  </form>

  <h2>カート</h2>
  <?php if (isset($_SESSION['cart'])) {
    $total_price = 0;
      foreach ($_SESSION['cart'] as $product) {
        $total_price += $product['price']*$product['quantity']; ?>
      <?= $product['name'] ?> (<?= $product['price'] ?>円) x <?= $product['quantity'] ?>個<br>
    <?php } ?>
    合計: <?= $total_price*1.1 ?>円(税込)<br>
    <form method="POST"><button type="submit" name="del_from_cart">カートを空にする</button></form>
  <?php } else { ?>
    <p>カートに商品はありません。</p>
  <?php } ?>
</body>
</html>