<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP実習</title>
</head>
<body>
  <h1>PHP実習</h1>
  <h2>アンケート</h2>
  <form method="POST" action="<?= $form->encode($_SERVER['PHP_SELF']) ?>">
  <table>
    <?php if ($errors) { ?>
      <tr>
        <td>以下のエラーを修正してください：</td>
        <td><ul>
          <?php foreach ($errors as $error) { ?>
            <li><?= $form->encode($error) ?></li>
          <?php } ?>
        </ul></td>
      </tr>
    <?php } ?>

    <tr><td>名前：</td><td><?= $form->input('text', ['name' => 'name']) ?></td></tr>

    <tr><td>メールアドレス：</td><td><?= $form->input('text', ['name' => 'email']) ?></td></tr>

    <tr><td>年齢：</td><td><?= $form->input('text', ['name' => 'age']) ?></td></tr>

    <tr><td>興味のある<br>プログラミング言語：</td>
      <td><?= $form->input('checkbox', ['name' => 'php', 'value' => 'yes']) ?>PHP 
      <?= $form->input('checkbox', ['name' => 'js', 'value' => 'yes']) ?>JavaScript 
      <?= $form->input('checkbox', ['name' => 'html', 'value' => 'yes']) ?>HTML/CSS 
      <?= $form->input('checkbox', ['name' => 'sql', 'value' => 'yes']) ?>SQL 
      <!--
      <td><?= $form->input('checkbox', ['name' => 'langs', 'value' => 'php'], true) ?>PHP 
      <?= $form->input('checkbox', ['name' => 'langs', 'value' => 'js'], true) ?>JavaScript 
      -->
    </td></tr>

    <tr><td>学習に使われる<br>パソコン：</td>
      <td><label><?= $form->input('radio', ['name' => 'pc', 'value' => 'desktop']) ?>デスクトップPC </label>
      <label><?= $form->input('radio', ['name' => 'pc', 'value' => 'note']) ?>ノートPC </label></td>
    </tr>

    <tr><td>パソコンメーカー：</td>
      <td><?= $form->select($GLOBALS['pc_makers'], ['name' => 'pc_maker']) ?></td>
    </tr>

    <tr><td>コメント：</td>
          <td><?= $form->textarea(['name' => 'comments']) ?></td>
    </tr>

    <tr><td colspan="2" align="center">
      <?= $form->input('submit', ['value' => '送信']) ?></td>
    </tr>
  </table>
  </form>
</body>
</html>