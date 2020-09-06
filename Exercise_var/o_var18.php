<?php
print "ユーザー名は？";
$user = trim(fgets(STDIN));
print "ドメインは？";
$domain = trim(fgets(STDIN));
print "あなたのメールアドレス：" . $user . "@" . $domain . "\n";
?>
