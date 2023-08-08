<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stream = mb_convert_encoding(file_get_contents('27OSAKA.CSV'),"utf-8","sjis");
  $fp = tmpfile();
  fwrite($fp, $stream);
  rewind($fp);
  $zipdata = array();
  while ((!feof($fp)) && ($data = fgetcsv($fp))) {
    $work = array();
    $work['zipcode'] = $data[2];
    $work['city'] = $data[7];
    $work['place'] = $data[8];
    $zipdata[] = $work;
  }
  fclose($fp);
  if (isset($_POST['ziptocity'])) {
    $zip1 = $_POST['zip1'] ?? '000';
    $zip2 = $_POST['zip2'] ?? '0000';
    foreach ($zipdata as $data) {
      if ($data['zipcode'] == ($zip1.$zip2)) {
        $city = $data['city'];
        $place = $data['place']!='以下に掲載がない場合' ? $data['place'] : '';
        break;
      }
    }
  }
  if (isset($_POST['citytozip'])) {
    $city = $_POST['city'] ?? '';
    $place = $_POST['place'] ?? '';
    foreach ($zipdata as $data) {
      if ($data['city']==$city && ($data['place']==$place || $place=='')) {
        $zip1 = substr($data['zipcode'],0,3);
        $zip2 = substr($data['zipcode'],3);
        break;
      }
    }
  }
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
  <h1>大阪府 - 郵便番号検索</h1>
  <form method="POST">
    <p><label>郵便番号：<input type="text" name="zip1" size="3" value="<?php echo $zip1 ?? '' ?>"> - 
    <input type="text" name="zip2" size="4" value="<?php echo $zip2 ?? '' ?>"></label>
    <button type="submit" name="ziptocity">検索</button></p>
  </form>
  <hr width="100px" align="left">
  <form method="POST">
    <p><label>市区町村名：<input type="text" name="city" value="<?php echo $city ?? '' ?>"></label><br>
    <p><label>地名：<input type="text" name="place" value="<?php echo $place ?? '' ?>"></label>
    <button type="submit" name="citytozip">検索</button></p>
  </form>
</body>
</html>