<?php
for ($i=0; $i<50; $i++) {
  $nums[] = rand(0,9);
}
$result = [];
for ($i = 0; $i < count($nums); $i++) {
  if (!isset($result[$nums[$i]])) {
    $result[$nums[$i]] = 1;
  } else {
    $result[$nums[$i]]++;
  }
}
foreach ($result as $key => $value) {
  print $key . "は" . $value . "個\n";
}
?>
