<?php
$pc_makers = array('Lenovo','DELL','HP','Apple','Dynabook','NEC','VAIO','ASUS','Acer','自作PC','その他');
$langs = array('PHP','JavaScript','Python','Java','C/C++','C#','Ruby');
$errors = array();
$normal = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (file_exists('survey.csv')) {
    $fp = fopen('survey.csv', 'r');
    $survey = array();
    while ((!feof($fp)) && ($info = fgetcsv($fp))) {
      $survey[] = $info;
    }
    fclose($fp);
  }
  $name = $_POST['name'] ?? '';
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  if ($email == null || $email == false) {
    $email = $_POST['email'];
    $errors[] = '正しいメールアドレスを入力してください。';
  } else {
    if (isset($survey)) {
      foreach ($survey as $info) {
        if ($email == $info[1]) {
          $errors[] = 'ユーザーはすでに送信済です。';
        }
      }
    }
  }
  $age = $_POST['age'] ?? '';
  $language = implode("|", $_POST['langs'] ?? []);
  $pc = $_POST['pc'] ?? '';
  $maker = $_POST['maker'] ?? '';
  if (empty($maker)) {
    $errors[] = 'PCメーカーを選択してください。';
  }
  $comments = $_POST['comments'] ?? '';
  if (empty($errors)) {
    $normal = '送信しました。';
    if (isset($survey)) {
      $survey[] = array($name,$email,$age,$language,$pc,$maker,$comments);
    } else {
      $survey = array();
      $survey[] = array('名前','メールアドレス','年齢','興味のあるプログラミング言語','学習に使っているパソコン','パソコンメーカー','コメント');
      $survey[] = array($name,$email,$age,$language,$pc,$maker,$comments);
    }
    $fp = fopen('survey.csv', 'w');
    foreach ($survey as $fields) {
      fputcsv($fp, $fields);
    }
    fclose($fp);
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
  <h2>アンケート</h2>
  <?php if ($errors) { ?>
    <ul>
      <?php foreach ($errors as $err) { ?>
        <li><?= $err ?></li>
      <?php } ?>
    </ul>
  <?php } ?>
  <?php if ($normal) { ?>
    <ul><li><?= $normal ?></li></ul>
  <?php } ?>
  <form method="POST">
  <table>
    <tr><td><label for="name">名前：</label></td><td><input type="text" name="name" id="name" value="<?= $name ?? '' ?>" required></td></tr>
    <tr><td><label for="email">メールアドレス：</label></td><td><input type="email" name="email" id="email"  value="<?= $email ?? '' ?>" required></td></tr>
    <tr><td><label for="age">年齢：</label></td><td><input type="number" name="age" id="age" min="18" max="110"  value="<?= $age ?? '' ?>" required></td></tr>
    <tr><td>興味のある<br>プログラム言語：</td>
    <td>
      <?php foreach ($langs as $lang) { ?>
        <?php
        $checked = '';
        if (isset($_POST['langs']) && in_array($lang,$_POST['langs'])) {
          $checked = 'checked';
        }
        ?>
        <label><input type="checkbox" name="langs[]" value="<?= $lang ?>" <?= $checked ?>><?= $lang ?></label>
      <?php } ?>
    </td></tr><tr><td>学習に使われる<br>パソコン：</td>
    <td>
      <?php $checked = $_POST['pc'] ?? 'デスクトップPC' ?>
      <label><input type="radio" name="pc" value="デスクトップPC" <?= $checked == 'デスクトップPC' ? 'checked' : '' ?>>デスクトップPC</label>
      <label><input type="radio" name="pc" value="ノートPC" <?= $checked == 'ノートPC' ? 'checked' : '' ?>>ノートPC</label>
    </td></tr>
    <tr><td>パソコンメーカー：</td>
    <td>
      <select name="maker" required>
        <option value="">選択してください。</option>
        <?php foreach ($pc_makers as $value) { ?>
          <?php $selected = '';
          if (isset($maker) && $maker==$value) {
            $selected = 'selected';
          } ?>
          <option value="<?= $value ?>" <?= $selected ?>><?= $value ?></option>
        <?php } ?>
      </select>
    </td></tr>
    <tr><td>コメント：</td><td><textarea name="comments" rows="3" cols="30"><?= $comments ?? '' ?></textarea></td></tr>
  </table>
  <br>
  <button type="submit">送信</button>
  </form>
</body>
</html>