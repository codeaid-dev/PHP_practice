<?php
  $msg = null;
  if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
    $old_name = $_FILES['image']['tmp_name'];
    $new_name = $_FILES['image']['name'];
//    $new_name = pathinfo($new_name);
//    $extension = $new_name['extension'];
//    $new_name = $new_name['filename'];
    $extension = substr($new_name, strrpos($new_name, '.')+1);
    $new_name = substr($new_name, 0, strrpos($new_name, '.'));
    $new_name .= '_'.date("YmdHis");
    $new_name .= '.'.$extension;
    if (!exif_imagetype($_FILES['image']['tmp_name'])) {
      header('Location: form4.php');
      exit;
    }
    if (move_uploaded_file($old_name, 'images/' . $new_name)) {
      $msg = 'アップロードしました。';
    } else {
      $msg = 'アップロードできませんでした。';
      var_dump($msg);
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