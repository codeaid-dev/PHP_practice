<?php
$info1 = array("Yamada"=>["breakfast"=>"bread & coffee",
                        "lunch"=>"humburger",
                        "dinner"=>"beef steak"],
              "Kondo"=>["breakfast"=>"rice & misosoup",
                        "lunch"=>"fish set meal",
                        "dinner"=>"oden"],
              "Sato"=>["breakfast"=>"cereals",
                      "lunch"=>"pasta",
                      "dinner"=>"acqua pazza"]);

$info2 = array("Yamada"=>["breakfast"=>"bacon & egg",
                      "lunch"=>"hotdog",
                      "dinner"=>"beef curry"],
            "Kondo"=>["breakfast"=>"rice & pickles",
                      "lunch"=>"riceball",
                      "dinner"=>"okonomiyaki"],
            "Sato"=>["breakfast"=>"salad",
                    "lunch"=>"pizza",
                    "dinner"=>"risotto"]);
$info = array(1=>$info1, 2=>$info2);
print "名前は？";
$name = trim(fgets(STDIN));
print "どの食事？";
$meal = trim(fgets(STDIN));
print "何日目？";
$day = trim(fgets(STDIN));
print "{$name}さんの{$meal}は{$info[$day][$name][$meal]}です\n";
?>
