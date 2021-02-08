// データベース　解答例
// ********** Q1 **********
C, D
// ********** Q2 **********
D
// ********** Q3 **********
B
// ********** Q4 **********
B
// ********** Q5 **********
A
// ********** Q6 **********
C
// ********** Q7 **********
D
// ********** Q8 **********
C
// ********** Q9 **********
C
// ********** Q10 **********
C
// ********** Q11 **********
F
// ********** Q12 **********
①$_POST['id'] ②$_POST['name'] ③':id' ④"%".$name."%" ⑤':name'
<?php
$id = htmlspecialchars($_POST['id']); // name属性が”id”の値がPOST送信されたデータ
$name = htmlspecialchars($_POST['name']); // name属性が”name”の値がPOST送信されたデータ

try {
   $db = new PDO('mysql:host=mysql;dbname=testsample;charset=utf8', 'user-id', 'user-pass');
   $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   $stmt = $db->prepare("SELECT * FROM students WHERE id=:id OR name LIKE :name");
   $stmt->bindParam(':id', $id, PDO::PARAM_STR); // id列のデータが$idと一致するかどうか
   $name = "%".$name."%"; // name列のデータに$nameが含まれているかどうか
   $stmt->bindParam(':name', $name, PDO::PARAM_STR);
   $stmt->execute();
 } catch (PDOException $e) {
   die ('エラー：'.$e->getMessage());
 }
