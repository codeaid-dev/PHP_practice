<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  print "エンティティ変換する：". htmlentities($_POST['text_1'])."<br>";
  print "エンティティ変換しない：". $_POST['text_2']."<br>";
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
  <form method="POST" action="form6.php">
  <label>エンティティ変換する：<input type="text" name="text_1"></label><br>
  <label>エンティティ変換しない：<input type="text" name="text_2"></label>
  <br>
  <button type="submit">送信</button>
  </form>
</body>
</html>