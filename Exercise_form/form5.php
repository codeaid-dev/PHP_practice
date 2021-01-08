<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  list($form_errors, $input) = validate_form();
  if ($form_errors) {
    show_form($form_errors);
  } else {
    process_form($input);
  }
} else {
  show_form();
}

function process_form($input) {
  print "名前：". $input['name']. "<br>";
  print "メールアドレス：". $input['email']. "<br>";
  print "年齢：". $input['age']. "<br>";
  print "体温：". $input['temp']. "<br>";
}

function show_form($errors = '') {
  if ($errors) {
    print '以下のエラーを修正してください: <ul><li>';
    print implode('</li><li>', $errors);
    print '</li></ul>';
  }
  print<<<_HTML_
    <form method="POST" action="$_SERVER[PHP_SELF]">
    <label>名前：<input type="text" name="name"></label><br>
    <label>メールアドレス：<input type="text" name="email"></label><br>
    <label>年齢：<input type="text" name="age"></label><br>
    <label>体温：<input type="text" name="temp"></label><br>
    <br>
    <button type="submit">送信</button>
    </form>
    _HTML_;
}

function validate_form() {
  $input['name'] = trim($_POST['name'] ?? '');
  if (strlen($input['name']) == 0) {
    $errors[] = '名前を入力してください。';
  }
  $input['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  if (!$input['email']) {
    $errors[] = '正しいメールアドレスを入力してください。';
  }
  $input['age'] = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT,
                              array('options' => array('min_range' => 18,
                                                      'max_range' => 50)));
  if (is_null($input['age']) || ($input['age'] === false)) {
    $errors[] = '18才〜50才の範囲の正しい年齢を入力してください。';
  }
  $input['temp'] = filter_input(INPUT_POST, 'temp', FILTER_VALIDATE_FLOAT);
  if (is_null($input['temp']) || ($input['temp']) === false || ($input['temp'] > 37.2)) {
    $errors[] = '37.2度以下の正しい体温を入力してください。';
  }

  return array($errors, $input);
}