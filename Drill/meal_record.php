<?php
  $filename = 'meal.json';
  $meal = array();
  if (file_exists($filename)) {
    $json = file_get_contents($filename);
    $meal = json_decode($json,true);
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = [];
    $date = $_POST['date'] ?? '1970-1-1';
    $meal[$date] = array(
      'breakfast'=>$_POST['breakfast'],
      'lunch'=>$_POST['lunch'],
      'dinner'=>$_POST['dinner']);
    $json = json_encode($meal);
    file_put_contents($filename, $json);
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHPドリル</title>
  <style>
    table,th,td {
      border: 1px solid;
    }
  </style>
</head>
<body>
  <h1>食事の記録</h1>
  <form method="POST">
    <p><label>日付：<input type="date" name="date" required></label><br>
    <label>朝食：<input type="text" name="breakfast" required></label><br>
    <label>昼食：<input type="text" name="lunch" required></label><br>
    <label>夕食：<input type="text" name="dinner" required></label></p>
    <p><button type="submit">記録</button></p>
  </form>
  <h2>一覧</h2>
  <table>
    <tr>
      <th>日付</th>
      <th>朝食</th>
      <th>昼食</th>
      <th>夕食</th>
    </tr>
    <?php foreach ($meal as $key=>$val) { ?>
    <tr>
      <td><?php echo htmlspecialchars($key); ?></td>
      <td><?php echo htmlspecialchars($val['breakfast']); ?></td>
      <td><?php echo htmlspecialchars($val['lunch']); ?></td>
      <td><?php echo htmlspecialchars($val['dinner']); ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>