<?php
$test = array("English"=>65, "Japanese"=>73, "Math"=>45, "History"=>52);
$test["Math"] = 80;
$test["Music"] = 90;
foreach($test as $key => $value) {
  print $key . ":" . $value . "\n";
}
?>
