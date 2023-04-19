<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $correct = [];
    if (isset($_POST['question'])) { //問題作成
      $question = str_split($question);
      $num = $_POST['chars'];
      while ($num > 0) {
        $n = array_rand($question);
        $correct[] = $question[$n];
        unset($question[$n]);
        $num -= 1;
      }
      //問題と正解をCookieに保存(有効期限10分)
      setcookie("question", implode('',$question), time()+600, "/");
      setcookie("correct", implode('',$correct), time()+600, "/");
      setcookie("start_time", microtime(true), time()+600, "/");
    } else if (isset($_POST['answer'])) {
      //問題と正解をCookieから取得
      $question = str_split($_COOKIE['question']);
      $correct = str_split($_COOKIE['correct']);
      $start_time = (int)$_COOKIE['start_time'];
      $answer = explode(",",$_POST['answer']); //入力した答えを取得
      $answer = array_map('strtoupper',$answer);
      $flag = true;
      foreach ($correct as $cor) { //判定
        if (array_search($cor, $answer)===false) $flag = false;
      }
      if ($flag) {
        $result = '正解です。['.implode(',',$correct).']';
        $exec_time = (int)microtime(true) - $start_time;
      } else {
        $result = '不正解です。正解は['.implode(',',$correct).']';
      }
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
  <h1>アルファベットクイズ</h1>
  <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
    <p>抜けているアルファベットはどれ？(<?php echo count($correct).'文字ぬけている' ?>)</p>
    <p style="font-size:32px;"><?php echo implode("", $question); ?></p>
    <form method="POST">
      <label>答え：<input type="text" name="answer"></label><br>
      <br>
      <button type="submit">送信</button>
    </form>
    <h2>結果表示</h2>
    <p><?= $result ?? '' ?></p>
    <?php if (isset($exec_time)) { ?>
      <p><?= 'かかった時間は'.$exec_time.'秒です。' ?></p>
    <?php } ?>
    <p><a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">トップ</a></p>
  <?php } else { ?>
    <form method="POST">
      <p>隠すアルファベットの数：</p>
      <p><label><input type="radio" name="chars" value=1 checked>1文字</label>
      <label><input type="radio" name="chars" value=2>2文字</label>
      <label><input type="radio" name="chars" value=3>3文字</label></p>
      <p><button type="submit" name="question">出題</button></p>
    </form>
  <?php } ?>
</body>
</html>