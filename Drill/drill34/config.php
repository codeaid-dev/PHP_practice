<?php
//$dsn = "mysql:host=localhost;dbname=usersdb"; //XAMPP,MAMP,VM
$dsn = "mysql:host=mysql;dbname=usersdb"; //Docker
$dbuser = 'root';
$dbpass = 'password';

try {
  $pdo = new PDO($dsn, $dbuser, $dbpass); //MySQL
  //$pdo = new PDO("sqlite:./db/users.db"); //SQLite
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->query("CREATE TABLE IF NOT EXISTS users (
    username VARCHAR(256) PRIMARY KEY,
    email VARCHAR(256),
    password VARCHAR(256))");
} catch (PDOException $e) {
  die ('エラー：'.$e->getMessage());
}
