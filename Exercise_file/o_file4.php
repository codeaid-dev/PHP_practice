<?php
$fp = fopen('sites.txt','rb');
if (!$fp) {
  $e = error_get_last();
  die("ファイルオープンに失敗しました：" . $e['message']);
} else {
  while(($line = fgets($fp)) !== false) {
    //$line = str_replace(array("\n","\r","\r\n"),"",$line);
    $line = trim($line);
    if (!empty($line)) {
      $url = explode('|', $line);
      print '<li><a href="https://' . $url[0] . '">' . $url[1] . "</a></li>";
    }
  }
  if (!feof($fp)) {
      $e = error_get_last();
      die("ファイル読み込みに失敗しました：" . $e['message']);
  }
  if (!fclose($fp)) {
    $e = error_get_last();
    die("ファイルクローズに失敗しました：" . $e['message']);
  }
}
/**OREILLYの例ベース
$fh = fopen('sites.txt','rb');
if (!$fh) {
  $e = error_get_last();
  die("ファイルオープンに失敗しました：" . $e['message']);
} else {
  while (!feof($fh)) {
    $line = fgets($fh);
    if ($line !== false) {
      $line = trim($line);
      if (!empty($line)) {
        $info = explode('|', $line);
        print '<li><a href="https://' . $info[0] . '">' . $info[1] . "</a></li>";
      } else {
        $e = error_get_last();
        die("ファイル読み込みに失敗しました：" . $e['message']);
      }
    }
  }
  if (!fclose($fh)) {
    $e = error_get_last();
    die("ファイルクローズに失敗しました：" . $e['message']);
  }
}
*/
?>
