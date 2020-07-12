<?php
$str = "Government of the people, by the people, for the people";
$chk = "people";
$cnt = 0;
$tmp = "";
for ($i = 0; $i < strlen($str); $i++) {
  $tmp = substr($str, $i, strlen($chk));
  if ($tmp == $chk) {
    $cnt++;
  }
}
print "peopleの数は：" . $cnt . "\n";
?>
