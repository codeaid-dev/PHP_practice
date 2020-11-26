<?php
class Character {
  private $hp;
  private $name;
  public function __construct($name) {
    $this->name = $name;
  }

  public function setHp($hp) {
    $this->hp = $hp;
  }

  public function getHp() {
    return $this->hp;
  }

  public function getName() {
    return $this->name;
  }
}

class Hero extends Character {
  private $skill=40;
  public function __construct($name) {
    parent::__construct($name);
  }

  public function attack($monster) {
    $damage = rand(20,25);
    $monster->setHp($monster->getHp()-$damage);
    return $damage;
  }

  public function spAttack($monster) {
    $monster->setHp($monster->getHp()-$this->skill);
    return $this->skill;
  }
}

class Monster extends Character {
  public function __construct($name) {
    parent::__construct($name);
  }

  public function attack($hero) {
    $damage = rand(20,25);
    $hero->setHp($hero->getHp()-$damage);
    return $damage;
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
  <h2>HeroとMonsterの対決</h2>
  <?PHP
  const HERO_MAX = 100;
  const MONSTER_MAX = 120;
  $hero = new Hero("エニクス");
  $hero->setHp(HERO_MAX);
  $monster = new Monster("スライム");
  $monster->setHp(MONSTER_MAX);
  $turn = true;
  while ($hero->getHp() > 0 && $monster->getHp() > 0) {
 
    if ($turn) { // Heroの攻撃
      if (rand(1,5) == 1) {
        $damage = $hero->spAttack($monster);
      } else {
        $damage = $hero->attack($monster);
      }
      print '<p>'.$hero->getName().'は'.$monster->getName().'に'.$damage.'のダメージを与えた</p>';
      $turn = false;
    } else { // Monsterの攻撃
      $damage = $monster->attack($hero);
      print '<p>'.$monster->getName().'は'.$hero->getName().'に'.$damage.'のダメージを与えた</p>';
      $turn = true;
    }
  }
  if ($hero->getHp() > 0 && $monster->getHp() <= 0) {
    $num = MONSTER_MAX - $monster->getHp();
    print '<p style="font-size:40px">'.$hero->getName().'は'.$monster->getName().'をやっつけた</p>';
  } else if ($hero->getHp() <= 0 && $monster->getHp() > 0) {
    $num = HERO_MAX - $hero->getHp();
    print '<p style="font-size:40px">'.$hero->getName().'は'.$monster->getName().'にやられてしまった・・・</p>';
  } else {
    print '<p style="font-size:40px">'.$monster->getName().'は逃げてしまった</p>';
  }
  print '<p>'.$hero->getName().'のHP　'.$hero->getHp().'<br>'.$monster->getName().'のHP　'.$monster->getHp().'</p>';
  ?>
</body>
</html>