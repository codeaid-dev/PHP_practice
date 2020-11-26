<?php
class Person {
  private $name;
  private $age;
  private $birthplace;

  public function __construct($name, $age, $birthplace) {
    if (empty($name) || empty($age) || empty($birthplace)) {
      throw new Exception('空白の情報があります。');
    }
    $this->name = $name;
    $this->age = $age;
    $this->birthplace = $birthplace;
  }

  public function getName() {
    return $this->name;
  }
  public function getAge() {
    return $this->age;
  }
  public function getBirthplace() {
    return $this->birthplace;
  }
  public function getProfile() {
    return "名前は".$this->name."、年齢は".$this->age."歳、出身地は".$this->birthplace."です。";
  }
}

class Student extends Person {
  private $id;
  public function __construct($name, $age, $birthplace) {
    parent:: __construct($name, $age, $birthplace);
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getProfile() {
    $name = $this->getName();
    $age = $this->getAge();
    $birthplace = $this->getBirthplace();
    return "xxxの学生です。\n学籍番号は".$this->id."、名前は".$name."、年齢は".$age."歳、出身地は".$birthplace."です。";
  }
}

try {
  $person = new Student("佐藤", 18, "岡山");
  $person->setId('101');
  print $person->getProfile()."\n";
} catch (Exception $e) {
  print "例外発生：" . $e->getMessage();
}
?>