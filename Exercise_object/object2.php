<?php
class Person {
  private $name;
  private $age;
  private $birthplace;

  public function __construct($name, $age, $birthplace) {
    $this->name = $name;
    $this->age = $age;
    $this->birthplace = $birthplace;
  }

  public function getProfile() {
    return "名前は".$this->name."、年齢は".$this->age."歳、出身地は".$this->birthplace."です。";
  }
}

$person = new Person("山田", 43, "神奈川");
print $person->getProfile()."\n";
?>