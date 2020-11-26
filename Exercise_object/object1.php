<?php
class Person {
  public $name;
  public $age;
  public $birthplace;

  public function getProfile() {
    return "名前は".$this->name."、年齢は".$this->age."歳、出身地は".$this->birthplace."です。";
  }
}

$person = new Person();
$person->name = "田中";
$person->age = 35;
$person->birthplace = "大阪";
print $person->getProfile()."\n";
?>