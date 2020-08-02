<?php
function strWeight($name, $weight) {
  if ($weight <= 45) {
    return "{$name}さんは、痩せています";
  } else if ($weight >= 46 && $weight <= 65) {
    return "{$name}さんは、普通です";
  } else if ($weight >= 66 && $weight <= 75) {
    return "{$name}さんは、ぽっちゃりしています";
  } else {
    return "{$name}さんは、太っています";
  }
}

print strWeight("山田", 70) . "\n";
?>
