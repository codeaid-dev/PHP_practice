<?php
  $dsn = 'mysql:host=mysql;dbname=productdb';
  $user = 'root';
  $password = 'password';

  try {
    //$db = new PDO("sqlite:./db/product.db");
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->exec("CREATE TABLE IF NOT EXISTS products(
              id INTEGER PRIMARY KEY AUTO_INCREMENT,
              product VARCHAR(256) NOT NULL,
              price INTEGER NOT NULL)");
    $db->exec("CREATE TABLE IF NOT EXISTS oder(
              customer VARCHAR(256) NOT NULL,
              pid INTEGER,
              quantity INTEGER NOT NULL,
              FOREIGN KEY(pid) REFERENCES products(id))");
  } catch (PDOException $e) {
    die ('エラー：'.$e->getMessage());
  }
