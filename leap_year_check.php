<?php
function leap_year_check($year) {
  if ($year % 4 == 0) {
    if ($year % 100 != 0 || $year % 400 == 0) {
      return true;
    } else {
      return false;
    }
  }
  return false;
}

$year = filter_input(INPUT_GET, "year", FILTER_VALIDATE_INT);
?>

<!DOCTYPE html>
<title>閏年判定</title>
<h1>閏年判定</h1>

<?php if (empty($year)): ?>
  <p>判定する年を入力してください</p>
  <form action="leap_year_check.php" method="get">
    <label>判定年：
    <input name="year" type="number" value="<? echo htmlentities(date("Y"), ENT_QUOTES, "UTF-8") ?>">
    </label>
    <button type="submit">送信</button>
  </form>
<?php else: ?>
  <p><? echo htmlentities($year, ENT_QUOTES, "UTF-8") ?>年は</p>
  <?php if (leap_year_check($year)): ?>
    <p>閏年です</p>
  <?php else: ?>
    <p>平年です</p>
  <?php endif; ?>
<?php endif; ?>
