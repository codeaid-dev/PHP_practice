<?php
$dsn = 'mysql:host=mysql;dbname=test;charset=utf8'; // Dockerの場合
//$dsn = 'sqlite:./test.db'; // SQLiteの場合
$user = 'root';
$password = 'password';
try {
  $db = new PDO($dsn, $user, $password);
  //$db = new PDO($dsn); //SQLiteの場合

  $db->query("CREATE TABLE IF NOT EXISTS questions (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    question VARCHAR(255) NOT NULL,
    answer VARCHAR(255) NOT NULL
  ) DEFAULT CHARACTER SET=utf8;");

  $db->query("ALTER TABLE questions AUTO_INCREMENT = 1");

  $qes="あいうえお";
  $ans="abcde";
  $db->query("INSERT INTO questions (question,answer) VALUES ('{$qes}','{$ans}')");
  $qes="かきくけこ";
  $ans="fghij";
  $db->query("INSERT INTO questions (question,answer) VALUES ('{$qes}','{$ans}')");
  $qes="さしすせそ";
  $ans="klmno";
  $db->query("INSERT INTO questions (question,answer) VALUES ('{$qes}','{$ans}')");
  $sql = $db->query("SELECT * FROM questions");
  foreach ($sql as $row) {
    print("id:{$row['id']} question:{$row['question']} answer:{$row['answer']}\n");
  }
  print($sql->rowCount()."\n");

  $id = 2;
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // 静的プレースホルダーを指定
  $stmt = $db->prepare("SELECT * FROM questions WHERE id=:id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  while ($row = $stmt->fetch()) {
    print("id:{$row['id']} question:{$row['question']} answer:{$row['answer']}\n");
  }

  $db->query("DELETE FROM questions WHERE id>3");
} catch (PDOException $e) {
  die ('エラー：'.$e->getMessage());
}  
?>