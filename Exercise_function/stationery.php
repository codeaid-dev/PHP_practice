<?php
function stationery_check($stuff) {
  $goods = array('Note'=>100, 'Pen'=>80, 'Eraser'=>50);
  if (array_key_exists($stuff, $goods)) {
    return $goods[$stuff];
  }
}
function price($price, $tax=10) {
  $tax_amount = $price * ($tax / 100);
  return $price + $tax_amount;
}
?>
