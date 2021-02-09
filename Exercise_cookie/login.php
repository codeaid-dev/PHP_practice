<?php
session_start();
if (isset($_SESSION['username'])) {
  header('Location: index.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    //$db = new PDO('mysql:host=localhost;dbname=exercise;charset=utf8', 'foobar', 'password'); // XAMPP/MAMP/VM
    $db = new PDO('mysql:host=mysql;dbname=exercise;charset=utf8', 'foobar', 'password'); // Docker
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    die ('エラー：'.$e->getMessage());
  }

  list($errors, $input) = validate_form();
  if ($errors) {
    show_form($errors);
  } else {
    process_form($input);
  }
} else {
  show_form();
}

function show_form($errors = array()) {
  if ($errors) {
    $errorHtml = '<ul><li>';
    $errorHtml .= implode('</li><li>', $errors);
    $errorHtml .= '</li></ul>';
  } else {
    $errorHtml = '';
  }

  print <<<_FORM_
      <h1>PHP実習</h1>
      <h2>ログイン画面</h2>
      <form method="POST" action="$_SERVER[PHP_SELF]">
      $errorHtml
      ユーザー名：<input type="text", name="username"><br>
      パスワード：<input type="password", name="password"><br>
      <button type="submit">ログイン</button>
      </form>
      <p><a href="index.php">トップページへ戻る</a></p>
      _FORM_;
}

function validate_form() {
  global $db;
  $input = array();
  $errors = array();

  $password_ok = false;

  $input['username'] = trim($_POST['username'] ?? '');
  $submitted_password = trim($_POST['password'] ?? '');
  if (!strlen($input['username']) || !strlen($submitted_password)) {
    $errors[] = '正しいユーザー名とパスワードを設定してください。';
  } else {
    $stmt = $db->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->execute(array($input['username']));
    $row = $stmt->fetch();
    if ($row) {
      $password_ok = password_verify($submitted_password, $row[0]);
    }
    if (!$password_ok) {
      $error[] = '正しいユーザー名とパスワードを設定してください。';
    }
  }

  return array($errors, $input);
}

function process_form($input) {
  $_SESSION['username'] = $input['username'];
  print "ようこそ　$_SESSION[username]様";
  print '<p><a href="index.php">トップページへ戻る</a></p>';
}