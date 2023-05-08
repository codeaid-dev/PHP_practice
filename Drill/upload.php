<?php
  if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
    $tmp_name = $_FILES['image']['tmp_name'];
    $filename = $_FILES['image']['name'];
//    $filename = pathinfo($filename);
//    $extension = $filename['extension'];
//    $filename = $filename['filename'];
    $extension = substr($filename, strrpos($filename, '.')+1);
    $filename = substr($filename, 0, strrpos($filename, '.'));
    $filename .= '_'.date("YmdHis");
    $filename .= '.'.$extension;
    if (!exif_imagetype($_FILES['image']['tmp_name'])) {
      $result = '画像ファイルではありません。';
    } else {
      if (move_uploaded_file($tmp_name, 'images/' . $filename)) {
        $result = 'アップロードしました。';
      } else {
        $result = 'アップロードできませんでした。';
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
  <h1>画像ファイルのアップロード</h1>
  <?php if (isset($result)) { ?>
    <p><?php echo $result; ?>
  <?php } ?>
  <form method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit">アップロード</button>
  </form>
</body>
</html>