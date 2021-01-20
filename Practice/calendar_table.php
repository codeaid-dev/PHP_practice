<table>
  <tr>
    <?php
    $wday = ['日', '月', '火', '水', '木', '金', '土'];
    for ($i = 0; $i < 7; $i++) {
      echo '<th>' . $wday[$i] . '</th>';
    }
    ?>
  </tr>
  <?php for ($l = 0; $l < 5; $l++): ?>
  <tr>
    <?php
    for ($d = 1; $d <= 7; $d++) {
      $day = $l * 7 + $d;
      if ($day > 31) {
        break;
      } else {
        echo '<td>' . $day . '</td>';
      }
    }
    ?>
  </tr>
  <?php endfor; ?>
</table>
