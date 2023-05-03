<?php
function generate_password($length) {
  $lower = 'abcdefghijklmnopqrstuvwxyz';
  $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $numbers = '0123456789';
  $symbols = '!@#$%^&*()_+-=[]{};:,.<>?';

  $chars = ''; // 4種類の各文字それぞれ1文字ランダムに選ぶ
  $chars .= substr(str_shuffle($lower), 0, 1);
  $chars .= substr(str_shuffle($upper), 0, 1);
  $chars .= substr(str_shuffle($numbers), 0, 1);
  $chars .= substr(str_shuffle($symbols), 0, 1);

  // パスワードに含める残りの文字を生成する
  $remaining_length = $length - strlen($chars);
  $remaining_chars = substr(str_shuffle($lower . $upper . $numbers . $symbols), 0, $remaining_length);

  // 必要な文字と残りの文字を組み合わせてランダムな文字列を生成する
  $password = str_shuffle($chars . $remaining_chars);

  return $password;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $length = filter_input(INPUT_POST, 'digits', FILTER_VALIDATE_INT,
                        array('options' => array('min_range' => 8,'max_range' => 32)));
  if ($length != null && $length != false) {
    $result = generate_password($length);
  } else {
    $error = '桁数は8~32の整数を入力してください。';
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
  <h2>パスワード生成</h2>
  <?php if (isset($error)) { ?>
    <p><?php echo $error; ?></p>
  <?php } ?>
  <form method="POST">
    <p><label>桁数：<input type="text" name="digits" required></label></p>
    <p><button type="submit">生成</button></p>
  </form>
  <h2>結果表示</h2>
  <?php if (isset($result)) { ?>
    <p><?php echo $result; ?></p>
  <?php } ?>
</body>
</html>