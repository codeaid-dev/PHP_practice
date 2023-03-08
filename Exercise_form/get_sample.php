<?php
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $search = filter_input(INPUT_GET, 's', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($search != null && $search != false) {
      echo "GET送信されました。s=$search";
    }
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test</title>
</head>
<body>
  <h1>Test</h1>
  <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?s=test">Search here.</a>
</body>
</html>