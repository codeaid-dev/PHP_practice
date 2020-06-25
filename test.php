<?php
/*
if ('POST' == $_SERVER['REQUEST_METHOD']) {
  print("Hello, " . $_POST['my_name']);
} else {
  print<<<_HTML_
  <form method="post" action="$_SERVER[PHP_SELF]">
  <br>
  <input type="submit" value="Say Hello">
  </form>
  _HTML_;
}
*/
$list = [1,1,4,2,2];
for ($i = 0; $i < count($list); $i++) {
  $key = $list[$i];
  if ($counts[$key]) $counts[$key] += 1;
  else $counts[$key] = 1;
}
var_dump($list);
var_dump($counts);

$d = array(null);
var_dump($d);

$item = "タピオカ";
print "{$item}ドリンクが飲みたいです。<br>";

$ids = "id_01,id_02,id_03,id_04,";
print substr($ids, 0, -1);
