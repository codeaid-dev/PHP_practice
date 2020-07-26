<?php
$foods["Fruits"] = array("Apple"=>100, "Peach"=>200, "Remon"=>150);
$foods["Vegetables"] = array("Carrot"=>80, "Potato"=>70, "Radish"=>180);

foreach ($foods as $key => $value) {
  print $key . ":\n";
  foreach ($value as $k => $v) {
    print $k . " " . $v . "yen\n";
  }
}
?>
