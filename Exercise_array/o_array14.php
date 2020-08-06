<?php
$info = array("Yamada"=>["breakfast"=>"bread & coffee",
                        "lunch"=>"humburger",
                        "dinner"=>"beef steak"],
              "Kondo"=>["breakfast"=>"rice & misosoup",
                        "lunch"=>"fish set meal",
                        "dinner"=>"oden"],
              "Sato"=>["breakfast"=>"cereals",
                        "lunch"=>"pasta",
                        "dinner"=>"acqua pazza"]);

print "名前は？";
$name = trim(fgets(STDIN));
print "どの食事？";
$meal = trim(fgets(STDIN));
print "{$name}さんの{$meal}は{$info[$name][$meal]}です\n";
?>
