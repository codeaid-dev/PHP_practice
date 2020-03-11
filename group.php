<?php
$list = [1,2,3,'a','b','c',1,2,3,'a','b','c',1,2,3,'a','b','c'];
$groups = [];
$list_cnt = count($list);
for ($i = 0; $i < $list_cnt; $i++) {
  for ($j = $i+1; $j < $list_cnt; $j++) {
    if (isset($list[$i]) && isset($list[$j]) && $list[$i] == $list[$j]) {
      $tmp[] = $list[$j];
      unset($list[$j]);
    }
  }
  if (isset($list[$i])) {
    $tmp[] = $list[$i];
    $groups[] = $tmp;
    unset($tmp);
    unset($list[$i]);
  }
  if (empty($list)) break;
}
echo "<ul>";
foreach ($groups as $group) {
  echo "<li>" . "[";
  foreach ($group as $val) {
    echo $val;
  }
  echo "]" . "</li>";
}
echo "</ul>";
?>
