<?php
  $questions = array('Hokkaido' => 'Sapporo',
                    'Aomori' => 'Aomori',
                    'Iwate' => 'Morioka',
                    'Miyagi' => 'Sendai',
                    'Tochigi' => 'Utsunomiya',
                    'Gunma' => 'Maebashi',
                    'Kanagawa' => 'Yokohama');

  $prefs = array('Hokkaido', 'Aomori', 'Iwate', 'Miyagi', 'Tochigi', 'Gunma', 'Kanagawa');
  $ken = $prefs[rand(0, count($prefs)-1)];
  print($ken . "の県庁所在地は？\n");
  $answer = trim(fgets(STDIN));
  foreach ($questions as $key => $value) {
    if (!strcasecmp($ken, $key)) {
      if (!strcasecmp($answer, $value)) {
        print("正解！\n" . "その通りです。\n");
      } else {
        print("不正解・・・\n" . "{$key}の県庁所在地は{$value}です。\n");
      }
    }
  }
