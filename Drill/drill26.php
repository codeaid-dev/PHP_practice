<?php
if (isset($_GET['year'])) {
    $year = $_GET['year'];
} else {
    $year = date('Y');
}
if (isset($_GET['month'])) {
    $month = $_GET['month'];
} else {
    $month = date('m');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>カレンダー</title>
</head>
<body>
  <?php
  // 指定された年月のカレンダーを生成・表示
  echo generateCalendar($year, $month);
  ?>
</body>
</html>

<?php
// 指定された年月に対応するカレンダーを生成する関数
function generateCalendar($year, $month) {
    // 指定された年月の1日の曜日を取得する
    $firstDayOfWeek = date('N', strtotime($year . '-' . $month . '-1'));

    // 指定された年月の日数を取得する
    $lastDayOfMonth = date('t', strtotime($year . '-' . $month . '-1'));

    // カレンダーのHTMLを生成する
    $calendar = '<h3>' . $year . '年' . $month . '月</h3>';
    $calendar .= '<table>';
    $calendar .= '<tr><th>日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th></tr>';

    // カレンダーの日付部分を生成する
    $day = 1;
    $calendar .= '<tr>';
    for ($i = 1; $i <= 7; $i++) {
        if ($i <= $firstDayOfWeek) {
            $calendar .= '<td></td>';
        } else {
            $calendar .= '<td>' . $day . '</td>';
            $day++;
        }
    }
    $calendar .= '</tr>';
    for ($i = 2; $i <= 6; $i++) {
        $calendar .= '<tr>';
        for ($j = 1; $j <= 7; $j++) {
            if ($day > $lastDayOfMonth) {
                $calendar .= '<td></td>';
            } else {
                $calendar .= '<td>' . $day . '</td>';
                $day++;
            }
        }
        $calendar .= '</tr>';
    }

    $calendar .= '</table>';

    return $calendar;
}
?>