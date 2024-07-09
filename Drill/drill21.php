<?php
  if (!isset($_GET['page'])) {
    header('Location: drill21.php?page=1');
    exit;
  }
  $images = array();
  if ($handle = opendir('./images')) { //imagesフォルダ配下のファイル名を配列に格納
    while ($entry = readdir($handle)) {
      if ($entry != "." && $entry != "..") {
        $images[] = $entry;
      }
    }
    closedir($handle);
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
  <h2>ギャラリー</h2>
  <?php
  if (count($images) > 0) {
    $images = array_chunk($images, 2); //各要素2ファイルずつにする
    $page = intval($_GET['page']) - 1;
    if (!isset($images[$page])) {
      $page = 0;
    }
    foreach ($images[$page] as $img) { //画像の表示
      print '<img src="./images/' . $img . '" style="margin:5px;">';
    }
    print '<p>';
    for ($i=1; $i<=count($images); $i++) { //ページネーション
      if ($_GET['page'] != $i) {
        print '<span style="margin:5px;"><a href="drill21.php?page=' . $i . '">' . $i . '</a></span>';
      } else {
        print '<span style="margin:5px;">'.$i.'</span>';
      }
    }
    print '</p>';
  } else {
    print '<p>画像はまだありません。</p>';
  }
  ?>
</body>
</html>