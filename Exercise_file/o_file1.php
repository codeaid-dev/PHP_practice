<?php
$page = file_get_contents('page-template.html');

$page = str_replace('{page_title}', 'PHP実習', $page);

$num = rand(1, 2);
if ($num == 1) {
  $page = str_replace('{background}', 'blue', $page);
} else {
  $page = str_replace('{background}', 'red', $page);
}

print $page;
?>