<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'] ?? '';
    list($year,$month,$day) = explode('-',$date);
    $leap_year = ($year%4 == 0 && ($year%100 != 0 || $year%400 ==0)) ? true : false;
    if ($month==4 || $month==6 || $month==9 || $month==11) $month_length = 30;
    else if ($month==2) {
      if ($leap_year) $month_length = 29;
      else $month_length = 28;
    } else $month_length = 31;
    if ($day < $month_length) $day+=1;
    else {
      $day = 1;
      if ($month==12) {
        $month = 1;
        $year+=1;
      } else $month+=1;
    }
    $result = '次の日は「'.$year.'年'.$month.'月'.$day.'日」';
    // 別解
    //$date = new DateTime($date);
    //$date->modify('+1 days');
    //$result = '次の日は「'.$date->format('Y年m月d日').'」';

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
  <form method="POST">
    <label>年月日：<input type="date" name="date"></label><br>
    <br>
    <button type="submit">表示</button>
  </form>
  <h2>結果表示</h2>
  <?php $result = $result ?? ''; ?>
  <p><?php echo htmlspecialchars($result); ?></p>
</body>
</html>