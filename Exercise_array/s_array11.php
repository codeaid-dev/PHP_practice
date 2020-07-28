<?php
$nums = [[1,2,3],[4,5,6],[7,8,9]];
//$nums = [[1,2,3,4],[5,6,7,8],[9]];
//$nums = array(array(1,2,3),array(4,5,6),array(7,8,9));
//$nums = array([1,2,3],[4,5,6],[7,8,9]);
//$nums = [array(1,2,3),array(4,5,6),array(7,8,9)];
for ($i = 0; $i < 3; $i++) {
  for ($j =0; $j < count($nums[$i]); $j++) {
    print $nums[$i][$j] . " ";
  }
}

?>
