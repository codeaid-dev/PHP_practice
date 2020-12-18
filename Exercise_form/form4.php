<?php
  $msg = null;
  if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
    $old_name = $_FILES['image']['tmp_name'];
    $tmp_name = explode('.',$_FILES['image']['name']);
    $tmp_name = end($tmp_name);
    $new_name = date("YmdHis");
    $new_name .= rand();
    $new_name .= $tmp_name;
    if (exif_imagetype($_FILES['image']['tmp_name'])) {
      print '画像ファイルではありません';
      header('Location: form4.php');
      exit;
    }
    if (move_uploaded_file($old_name, 'images/' . $new_name)) {
      $msg = 'アップロードしました。';
    } else {
      $msg = 'アップロードできませんでした。';
    }
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
  <h1>PHP実習</h1>
  <p>画像をアップロードします</p>
  <?php
    if ($msg) {
      print '<p>'.$msg.'</p>';
    }
  ?>
  <form action="form4.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit">アップロード</button>
  </form>
</body>
</html>