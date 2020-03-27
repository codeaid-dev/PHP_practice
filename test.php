<?php
function createMsg($name, $price) {
  $msg = <<< EOM
  {$name}様
  ご注文を承りました。
  合計{$price}円です。\n
  EOM;
  echo $msg;
}

createMsg("三浦", 3000);
