<?php
$fp = @fopen('turrys.csv', 'r') or die('csvファイルを読み込めませんでした');
$coffee = array();
while (!feof($fp)) {
  $coffee[] = fgetcsv($fp);
}
fclose($fp);
$page = @file_get_contents('page-template3.html') or die('templateファイルを読み込めませんでした');

$page = str_replace('{page_title}', 'PHP実習', $page);

$contents = array('{coffee}' => $coffee[0][0],
                  '{desc}' => $coffee[0][1],
                  '{made_in}' => $coffee[0][2],
                  '{price}' => $coffee[0][3]);

$page = str_replace(array_keys($contents), array_values($contents), $page);
print $page;
?>