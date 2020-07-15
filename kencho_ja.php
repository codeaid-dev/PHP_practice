<?php
  $questions = array('北海道' => '札幌',
                    '青森県' => '青森',
                    '岩手県' => '盛岡',
                    '宮城県' => '仙台',
                    '栃木県' => '宇都宮',
                    '群馬県' => '前橋',
                    '神奈川県' => '横浜');

  $prefs = array('北海道', '青森県', '岩手県', '宮城県', '栃木県', '群馬県', '神奈川県');
  $ken = $prefs[rand(0, count($prefs)-1)];
  print($ken . "の県庁所在地は？\n");
  $answer = trim(fgets(STDIN));
  foreach ($questions as $key => $value) {
    if ($ken == $key) {
      if ($answer == $value) {
        print("正解！\n" . "その通りです。\n");
      } else {
        print("不正解・・・\n" . "{$key}の県庁所在地は{$value}です。\n");
      }
    }
  }
