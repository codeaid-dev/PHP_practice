<?php
function select_player($job, $gender, $name="Tobby") {
  print "職業：{$job}、性別：{$gender}、名前：{$name}のキャラクターを選びました。\n";
}

select_player();
select_player("Monk");
select_player("Monk", "female");
select_player("Monk", "female", "Jane");
?>
