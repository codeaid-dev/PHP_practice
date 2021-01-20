// オブジェクト指向　解答
// ********** Q1 **********
C
// ********** Q2 **********
B
// ********** Q3 **********
C
// ********** Q4 **********
C
// ********** Q5 **********
A
// ********** Q6 **********
D,E
// ********** Q7 **********
C
// ********** Q8 **********
B
// ********** Q9 **********
<?php
class Message {
  protected $message;

  public function __construct(string $msg) {
    $this->message = $msg;
  }
  public function setMsg(string $msg) {
    $this->message = $msg;
  }
  public function showMsg() {
    print($this->message);
  }
}

$obj = new Message("こんにちは！！\n");
$obj->showMsg();
$obj->setMsg("こんばんは\n");
$obj->showMsg();

// ********** Q10 **********
class Message {
  protected $message;
  protected $recipient;

  public function __construct(string $msg) {
    $this->message = $msg;
  }
  public function setMsg(string $msg) {
    $this->message = $msg;
  }
  public function setRecipient(string $recipient) {
    $this->recipient = $recipient;
  }
  public function showMsg() {
    print("受信者：" . $this->recipient . "\n");
    print("メッセージ：" . $this->message);
  }
}

$obj = new Message("おはよう\n");
$obj->setRecipient("山田太郎");
$obj->showMsg();


// ********** Q11 **********
class SNS extends Message {
  public $tool = "Twitter"; // ⑤
  public function showMsg()
  {
    parent::showMsg(); // ①
    print($this->tool . "を使用しています\n"); // ②
  }
}

$sns = new SNS("SNSからのメッセージです\n"); // ③
$sns->tool = "LINE";
$sns->setRecipient("田中二郎"); // ④
$sns->showMsg();

// ********** Q12 **********
class Car {
  private $name;
  protected $power;

  public function __construct($name, $power) {
    if (!is_numeric($power)) {
      throw new Exception('馬力は数字である必要があります'); // ①
    }
    $this->name = $name;
    $this->power = $power;
  }

  public function getName() {
    return $this->name;
  }

  public function getType() {
    if ($this->power >= 160) {
      return 'スポーツ';
    } else {
      return 'ノーマル';
    }
  }
}

$cars = array();
try { // ②
  $cars[] = new Car('Ferrari', 500);
  $cars[] = new Car('Carolla', 105);
} catch(Exception $e) { // ③
  print '車が作れません：'.$e->getMessage();
}
foreach ($cars as $car) {
  print '車名：'.$car->getName().'<br>タイプ：'.$car->getType().'<br><br>'; // ④
}