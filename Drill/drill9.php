<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $you = $_POST['hand'];
    $com = rand(1,3);
    if ($com==1) $comh='グー';
    else if ($com==2) $comh='チョキ';
    else $comh='パー';
    if (($you==1&&$com==2) || ($you==2&&$com==3) || ($you==3&&$com==1)) {
      $result = 'あなたの勝ち(コンピューターの手：'.$comh.')';
    } else if (($you==1&&$com==3) || ($you==2&&$com==1) || ($you==3&&$com==2)) {
      $result = 'コンピューターの勝ち(コンピューターの手：'.$comh.')';
    } else {
      $result = 'あいこ';
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
  <form method="POST">
    <h2>じゃんけん</h2>
    <p>あなたの手</p>
    <label>グー<input type="radio" name="hand" value=1 checked></label>
    <label>チョキ<input type="radio" name="hand" value=2></label>
    <label>パー<input type="radio" name="hand" value=3></label>
    <br>
    <button type="submit">ぽん</button>
  </form>
  <h2>結果表示</h2>
  <?php $result = $result ?? ''; ?>
  <p><?php echo $result; ?></p>
</body>
</html>