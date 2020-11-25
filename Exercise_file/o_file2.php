<?php
$page = file_get_contents('page-template2.html');

$page = str_replace('{page_title}', 'PHP実習', $page);

$num = rand(1,3);
$page = str_replace('{img_file}', "images/bk{$num}.png", $page);
$size = $num * 100;
$page = str_replace('{img_size}', "{$size}px", $page);

print $page;
file_put_contents('page.html', $page);
?>