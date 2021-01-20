<?php
$teams = ["team-A", "team-B", "team-C", "team-D", "team-E"];
for ($i = 0; $i < count($teams); $i++) {
  for ($j = $i+1; $j < count($teams); $j++) {
    print($teams[$i] . " vs " . $teams[$j] . "\n");
  }
}

// ********** Ex2 **********
$teams = ["team-A", "team-B", "team-C", "team-D", "team-E"];
$vss = ["team-A", "team-B", "team-C", "team-D", "team-E"];
foreach ($teams as $t1) {
  array_shift($vss);
  foreach ($vss as $t2) {
    print($t1 . " vs " . $t2 . "\n");
  }
}
?>
