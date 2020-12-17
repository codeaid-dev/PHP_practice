<?php
if (!isset($_GET['page'])) {
  header('Location: form3.php?page=1');
  exit;
}

$images = array();
$num = 2;

if ($handle = opendir('./images')) {
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
  <title>PHP実習</title>
  <style>
  span, img {
    margin: 5px;
  }
  </style>
</head>
<body>
  <h1>PHP実習</h1>
  <?php
  if (count($images) > 0) {
    $images = array_chunk($images, $num);
    $page = 0;
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
      $page = intval($_GET['page']) - 1;
      if (!isset($images[$page])) {
        $page = 0;
      }
    }

    foreach ($images[$page] as $img) {
      print '<img src="./images/' . $img . '">';
    }
    print '<p>';
    for ($i=1; $i<=count($images); $i++) {
      if ($_GET['page'] != $i) {
        print '<span><a href="form3.php?page=' . $i . '">' . $i . '</a></span>';
      } else {
        print '<span>'.$i.'</span>';
      }
    }
    print '</p>';
  } else {
    print '<p>画像はまだありません。</p>';
  }
  ?>
</body>
</html>