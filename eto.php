<?php
function eto($year) {
  $etos = ["子", "丑", "寅", "卯", "辰", "巳", "午", "羊", "申", "酉", "戌", "亥"];
  return $etos[($year - 4) % 12];
}

$year = filter_input(INPUT_GET, "year", FILTER_VALIDATE_INT);
?>

<!DOCTYPE html>
<title>干支計算機</title>
<h1>干支計算機</h1>

<?php if (empty($year)): ?>
  <p>数字を入力してください</p>
  <form method="get">
    <lavel>年</lavel>
    <input name="year" type="number" value="<?= htmlspecialchars(date("Y"), ENT_QUOTES, "UTF-8") ?>">
  </form>
<?php else: ?>
  <p><?= htmlspecialchars($year, ENT_QUOTES, "UTF-8") ?>年は
  <?= eto($year) ?>年です。</p>
<?php endif; ?>
