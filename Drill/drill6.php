<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $money = filter_input(INPUT_POST, 'money', FILTER_VALIDATE_INT);
    $borrow = filter_input(INPUT_POST, 'borrow', FILTER_VALIDATE_INT);
    $book = filter_input(INPUT_POST, 'book', FILTER_VALIDATE_INT);
    if ($money!=null && $money!=false && $money>0 &&
      $borrow!=null && $borrow!=false && $borrow>0 &&
      $book!=null && $book!=false && $book>0) {
        if ($money+$borrow < $book) {
          $result = '購入できません。';
        } else if ($money >= $book) {
          $result = '借りずに購入できます。';
        } else {
          $result = '借りる金額は'.($book-$money).'円です。';
        }
    } else {
      $result = '正の整数を入力してください。';
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
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <label>所持金：<input type="text" name="money"></label><br>
    <label>借りられる金額：<input type="text" name="borrow"></label><br>
    <label>本の価格：<input type="text" name="book"></label><br>
    <br>
    <button type="submit">表示</button>
  </form>
  <h2>結果表示</h2>
  <?php $result = $result ?? ''; ?>
  <p><?php echo htmlspecialchars($result); ?></p>
</body>
</html>