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

  public function getProfile() {
    return "名前は".$this->name."、年齢は".$this->age."歳、出身地は".$this->birthplace."です。";
  }
}

try {
  $person = new Person("山田", 43, "");
  print $person->getProfile()."\n";
} catch (Exception $e) {
  print "例外発生：" . $e->getMessage();
}
?>