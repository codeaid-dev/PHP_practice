/* データベース・テーブル・ユーザはrootで作成 */
/* bookstoreデータベース作成 */
CREATE DATABASE bookstore;

/* booksテーブル作成 */
CREATE TABLE books (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  isbn VARCHAR(17) NOT NULL,
  name VARCHAR(255) NOT NULL,
  price INT NOT NULL,
  page INT NOT NULL,
  release DATE
) DEFAULT CHARACTER SET=utf8;

/* bookstoreデータベースのユーザ作成（bookadmin） */
GRANT ALL ON bookstore.* to 'bookadmin'@'mysql' IDENTIFIED BY 'password';
/* GRANT ALL ON bookstore.* to 'bookadmin'@'localhost' IDENTIFIED BY 'password'; */
FLUSH PRIVILEGES;

/* 以下はユーザ（bookadmin）の確認 */
mysql -u bookadmin -p
USE bookstore;
DESC books;