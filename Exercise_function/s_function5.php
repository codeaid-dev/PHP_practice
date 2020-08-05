<?php
function stationery_check($stuff) {
  $goods = array('Note'=>100, 'Pen'=>80, 'Eraser'=>50);
  if (array_key_exists($stuff, $goods)) {
    return $goods[$stuff];
  }
}

print "入力：";
$str = trim(fgets(STDIN));
$price = stationery_check($str);
if ($price) {
  print "{$price}円\n";
}
?>
