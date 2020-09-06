<?php
print "お名前は？";
$name = trim(fgets(STDIN));
$msg = <<< EOM
{$name}様
ご注文を承りました。\n
EOM;
echo $msg;
?>
