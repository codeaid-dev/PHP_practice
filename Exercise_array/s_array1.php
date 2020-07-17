<?php
$name = ["はるき", "かおる", "ひでと", "まさとし", "たかのり"];
for ($i = 0; $i < count($name); $i++) {
  if ($name[$i] == "まさとし") {
    print $name[$i] . "のキーは" . $i . "です";
  }
}
?>
