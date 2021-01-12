<?php
// FormHelper.phpがこのファイルと同じディレクトリにあることを前提とする
require 'FormHelper.php';

// セレクトメニューに選択肢の配列を用意する
// これらはdisplay_form(), validate_form(), process_form()で必要なので、
// グローバルスコープで宣言する
$pc_makers = array('lenovo' => 'Lenovo',
                    'dell' => 'DELL',
                    'hp' => 'HP',
                    'apple' => 'Apple',
                    'dynabook' => 'Dynabook',
                    'nec' => 'NEC',
                    'vaio' => 'VAIO',
                    'asus' => 'ASUS',
                    'acer' => 'Acer',
                    'self' => '自作PC',
                    'other' => 'その他');

$langs = array('php' => 'PHP',
              'js' => 'JavaScript',
              'html' => 'HTML/CSS',
              'sql' => 'SQL');
// メインページのロジック：
// - フォームがサブミットされたら、検証して処理するかまたは再表示する
// - フォームがサブミットされなかったら表示する
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // validate_form()がエラーを返したら、エラーをshow_form()に渡す
  list($errors, $input) = validate_form();
  if ($errors) {
    show_form($errors);
  } else {
    // サブミットされたデータが有効なら処理する
    process_form($input);
  }
} else {
  // フォームがサブミットされなかったので、表示する
  show_form();
}

function show_form($errors = array()) {
  $defaults = array('pc' => 'desktop'/*,
                    'php' => 'yes', 'js' => 'yes'*/);
  // 適切なデフォルトで$formを用意する
  //$form = new FormHelper($defaults);
  $form = new FormHelper();
  // すべてのHTMLとフォーム表示をわかりやすくするため個別のファイルに入れる
  include 'survey-form.php';
}

function validate_form() {
  $input = array();
  $errors = array();

  // 名前が入力されているか確認
  $input['name'] = trim($_POST['name'] ?? '');
  if (!strlen($input['name'])) {
    $errors[] = '名前を入力してください。';
  }

  // 正しいメールアドレスかどうか確認
  $input['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  if (!$input['email']) {
    $errors[] = '正しいメールアドレスを入力してください。';
  }

  // 18才以上の年齢が入力されているか確認
  $input['age'] = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT,
                              array('options' => array('min_range' => 18)));
  if (is_null($input['age']) || ($input['age'] === false)) {
    $errors[] = '18才以上の年齢を入力してください。';
  }

  // プログラミング言語が選択されているか確認
  $input['php'] = $_POST['php'] ?? 'no';
  $input['js'] = $_POST['js'] ?? 'no';
  $input['html'] = $_POST['html'] ?? 'no';
  $input['sql'] = $_POST['sql'] ?? 'no';

  // 学習に使われているパソコンが選択されているか確認
  $input['pc'] = $_POST['pc'] ?? '';
  if (!in_array($input['pc'], ['desktop', 'note'])) {
    $errors[] = '使っているパソコンを選択してください。';
  } else if ($input['pc'] == 'desktop') {
    $input['pc'] = "デスクトップPC";
  } else {
    $input['pc'] = "ノートPC";
  }

  // パソコンメーカーが選択されているか確認
  $input['pc_maker'] = $_POST['pc_maker'] ?? '';
  if (!array_key_exists($input['pc_maker'], $GLOBALS['pc_makers'])) {
    $errors[] = 'パソコンメーカーを選択してください。';
  } else {
    $input['pc_maker'] = $GLOBALS['pc_makers'][$input['pc_maker']];
  }

  // コメントを確認
  $input['comments'] = trim($_POST['comments'] ?? '');

  return array($errors, $input);
}

function process_form($input) {
  $langs = array();
  if (isset($input['php']) && ($input['php'] == 'yes')) {
    $langs[] = $GLOBALS['langs']['php'];
  }
  if (isset($input['js']) && ($input['js'] == 'yes')) {
    $langs[] = $GLOBALS['langs']['js'];
  }
  if (isset($input['html']) && ($input['html'] == 'yes')) {
    $langs[] = $GLOBALS['langs']['html'];
  }
  if (isset($input['sql']) && ($input['sql'] == 'yes')) {
    $langs[] = $GLOBALS['langs']['sql'];
  }
  $lang_str = implode(", ", $langs);
  // 表示テキストを作成する
  $idsplay=<<<_SURVEY_
        ご回答ありがとうございます。
        名前： {$input['name']}
        メールアドレス：{$input['email']}
        年齢：{$input['age']}
        興味のあるプログラミング言語：$lang_str
        学習に使われるパソコン：{$input['pc']}
        パソコンメーカー：{$input['pc_maker']}
        _SURVEY_;
  if (strlen(trim($input['comments']))) {
    $idsplay .= "\nコメント：".$input['comments'];
  }

  // メッセージを出力するが、HTMLエンティティにエンコードし、開業を<br>タグに変える
  //print nl2br(htmlentities($idsplay, ENT_HTML5));
  print nl2br(htmlspecialchars($idsplay, ENT_HTML5));
}
?>