<?php
    $ascii = ['a', 'b', 'c', 'd', 'E', 'F', 'G', 'H', '0', '1', '2', '3', '4', '!', '@', '#', '$', '%'];
    $password = [];
    for ($i = 0; $i < 8; $i++) {
        $index = rand(0, count($ascii)-1);
        $password[] = $ascii[$index];
    }
    $pass_str = implode($password);
    echo "password: ".$pass_str;
?>