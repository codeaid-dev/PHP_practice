<?php
$year = date("Y"); // 今年
$month = date("n"); // 今月

$last_day = date("j", mktime(0,0,0,$month + 1, 0, $year)); // 月の最後の日を取得
for ($i = 1; $i <= $last_day; $i++) {
  $wday = date("w", mktime(0,0,0,$month,$i,$year)); // 指定日の曜日を取得 0(日曜)~6(土曜)

  $week[$wday] = $i;
  if ($wday == 6 || $i == $last_day) {
    $calendar[] = $week;
    unset($week);
  }
}
echo <<< HTML
<table>
  <tr>
    <th>日</th>
    <th>月</th>
    <th>火</th>
    <th>水</th>
    <th>木</th>
    <th>金</th>
    <th>土</th>
  </tr>
HTML;

foreach ($calendar as $w) {
  echo "<tr>";
  for ($i = 0; $i < 7; $i++) {
    if (isset($w[$i])) {
      echo "<td>" . $w[$i] . "</td>";
    } else {
      echo "<td></td>";
    }
  }
  echo "</tr>";
}
echo "</table>";
?>