<?php
class Dessert {
  private $name;
  protected $ingredients = array();

  public function __construct($name, $ingredients) {
    if (!is_array($ingredients)) {
      throw new Exception('材料は配列である必要があります');
    }
    $this->name = $name;
    $this->ingredients = $ingredients;    
  }

  public function hasIngredient($ingredient) {
    return in_array($ingredient, $this->ingredients);
  }

  public function getName() {
    return $this->name;
  }

  public static function getKinds() {
    return array('ドリンク', 'アイス', 'ケーキ');
  }
}

class ComboDessert extends Dessert {
  public function __construct($name, $entrees) {
    parent::__construct($name, $entrees);
    foreach ($entrees as $entree) {
      if (!$entree instanceof Dessert) {
        throw new Exception('材料はDessertクラスのオブジェクトである必要があります');
      }
    }
  }

  public function hasIngredient($ingredient) {
    foreach ($this->ingredients as $entree) {
      if ($entree->hasIngredient($ingredient)) {
        return true;
      }
    }
    return false;
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP実習</title>
</head>
<body>
  <h1>PHP実習</h1>
  <?PHP
  try {
    $coffee = new Dessert('コーヒー', array('コーヒー豆', '水'));
    $latte = new Dessert('カフェラテ', array('コーヒー豆', '水', '牛乳'));
    $icecream = new Dessert('アイスクリーム', array('牛乳', '卵', '生クリーム', '砂糖'));
  } catch (Exception $e) {
    print "デザートが作れません：".$e->getMessage();
  }
  ?>
  <ul><?php
  foreach (array('茶葉','コーヒー豆','牛乳','生クリーム') as $ing) {
    if ($coffee->hasIngredient($ing)) {
      print "<li>{$coffee->getName()}は{$ing}を含みます</li>";
    }
    if ($latte->hasIngredient($ing)) {
      print "<li>{$latte->getName()}は{$ing}を含みます</li>";
    }
    if ($icecream->hasIngredient($ing)) {
      print "<li>{$icecream->getName()}は{$ing}を含みます</li>";
    }
  }
  ?></ul>
  <?php
  print "Dessertクラスには、".implode(",",Dessert::getKinds())."の種類があります</p>";
  try {
    $afoguard = new ComboDessert('アフォガード', array($coffee, $icecream));
  } catch (Exception $e) {
    print "アフォガードが作れません：".$e->getMessage();
  }
  ?>
  <ul><?php
  foreach (array('茶葉','コーヒー豆','生クリーム','卵') as $ing) {
    if ($afoguard->hasIngredient($ing)) {
      print "<li>{$afoguard->getName()}は{$ing}を含みます</li>";
    }
  }
  ?></ul>
</body>
</html>