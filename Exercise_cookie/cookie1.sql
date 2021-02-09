/* exerciseデータベース作成 */
CREATE DATABASE exercise;

USE exercise;

/* exerciseデータベースのユーザ作成（foobar） */
/* GRANT ALL ON exercise.* to 'foobar'@'localhost' IDENTIFIED BY 'password'; */
GRANT ALL ON exercise.* to 'foobar'@'%' IDENTIFIED BY 'password';
FLUSH PRIVILEGES;

/* foobarユーザでログイン */
mysql -u foobar -p

USE exercise;

/* usersテーブル作成 */
CREATE TABLE users (
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
) DEFAULT CHARACTER SET=utf8;

/* テーブル確認 */
DESC users;
