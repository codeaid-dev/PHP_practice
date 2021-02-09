<?php
session_start();
if (isset($_SESSION['username'])) {
  unset($_SESSION['username']);
  print "<p>ログアウトしました。</p>";
  print '<p><a href="index.php">トップページへ戻る</a></p>';
  exit();
}
header('Location: index.php');
?>