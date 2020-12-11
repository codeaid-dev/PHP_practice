/*** 1. ***/
SELECT ISBN,書籍名,価格,ページ数,発売日 FROM 書籍
/*** 2. ***/
SELECT ISBN FROM 書籍
/*** 3. ***/
SELECT ISBN,価格 FROM 書籍
/*** 4. ***/
SELECT * FROM 書籍
/*** 5. ***/
UPDATE 書籍 SET 書籍名='XXXXX'
/*** 6. ***/
UPDATE 書籍 SET 価格=3000,発売日='2020-12-01'
/*** 7. ***/
INSERT INTO 書籍(ISBN,書籍名,価格,ページ数,発売日) VALUES ('9784295005094','SQL入門',2800,488,'2018-11-30')
INSERT INTO 書籍(ISBN,書籍名,価格,ページ数,発売日) VALUES ('9784873117935','初めてのPHP',3000,364,'2017-3-18')
INSERT INTO 書籍(ISBN,書籍名,価格,ページ数,発売日) VALUES ('9784295006329','Python入門',2400,376,'2019-6-13')
/*** 8. ***/
SELECT * FROM 書籍 WHERE ISBN='9784873117935'
/*** 9. ***/
UPDATE 書籍 SET 価格=2500 WHERE ISBN='9784295005094'
/*** 10. ***/
SELECT * FROM 書籍 WHERE 価格<=2500
/*** 11. ***/
SELECT * FROM 書籍 WHERE 価格>=3000
/*** 12. ***/
SELECT * FROM 書籍 WHERE 発売日>='2018-01-01'
/*** 13. ***/
SELECT * FROM 書籍 WHERE 発売日<'2019-12-01'
/*** 14. ***/
SELECT * FROM 書籍 WHERE ページ数<300
/*** 15. ***/
SELECT ISBN,書籍名,価格 FROM 書籍 WHERE 書籍名 LIKE '%PHP%'
/*** 16. ***/
DELETE FROM 書籍 WHERE 書籍名 LIKE 'S%'
/*** 17. ***/
SELECT * FROM 書籍 WHERE 発売日>='2019-04-01' AND 発売日<='2020-03-31'
/*** 18. ***/
SELECT * FROM 書籍 WHERE 発売日>='2020-01-01' AND 価格<=2000
/*** 19. ***/
SELECT * FROM 書籍 WHERE (分類=2 AND 価格<=2000) OR (分類=1 AND 価格<=1000)
/*** 20. ***/
SELECT * FROM 書籍 WHERE ISBN LIKE '9784_________' OR 書籍名 LIKE 'は___%L'
/*** 21. ***/
SELECT * FROM 注文 WHERE ISBN='9784295005094' OR ISBN='9784873117935'
/*** 22. ***/
SELECT ISBN FROM 注文 WHERE 注文日>='2020-05-01' AND 注文日<'2020-06-01' AND 数量>=5
/*** 23. ***/
SELECT * FROM 注文 WHERE 数量>=10 OR ポイント割引料 IS NOT NULL
/*** 24. ***/
SELECT * FROM 注文 WHERE ポイント割引料 IS NULL
/*** 25. ***/
SELECT 注文日,ISBN,数量 FROM 注文 WHERE 数量>20
/*** 26. ***/
SELECT 注文日,ISBN,数量 FROM 注文 WHERE 数量 BETWEEN 5 AND 10
/*** 27. ***/
SELECT * FROM 注文 ORDER BY 注文番号
/*** 28. ***/
SELECT ISBN FROM 注文 ORDER BY 注文日 DESC
/*** 29. ***/
SELECT 注文日 FROM 注文 ORDER BY 注文日 DESC OFFSET 0 FETCH FIRST 10 ROWS ONLY
/*** 30. ***/
SELECT ISBN,価格/100 AS 百円単位の価格 FROM 書籍 WHERE 価格>=5000
/*** 31. ***/
SELECT DISTINCT 分類 AS 分類コード, CASE 分類 WHEN '1' THEN '理工' WHEN '2' THEN 'プログラム' WHEN '3' THEN '資格' END AS 分類別 FROM 書籍
/*** 32. ***/
SELECT ISBN,書籍名, CASE WHEN 価格<1000 THEN 'C' WHEN 価格>=1000 AND 価格<3000 THEN 'B' ELSE 'A' END AS 価格ランク FROM 書籍
/*** 33. ***/
SELECT LENGTH(ISBN),LENGTH(REPLACE(書籍名,'　','')),LENGTH(CAST(価格 AS VARCHAR)) FROM 書籍
/*** 34. ***/
SELECT * FROM 書籍 WHERE SUBSTRING(書籍名,1,10) LIKE '%入門%'
/*** 35. ***/
SELECT 書籍名,価格,価格*1.1 AS 税込価格 FROM 書籍 ORDER BY 価格 DESC
/*** 36. ***/
SELECT DISTINCT 分類, CASE 分類 WHEN '1' THEN '理工' WHEN '2' THEN 'プログラム' WHEN '3' THEN '資格' END AS 分類名 FROM 書籍
/*** 37. ***/
SELECT SUBSTRING(ISBN,1,3) || '-' || SUBSTRING(ISBN,4,1) || '-' || SUBSTRING(ISBN,5,3) || '-' || SUBSTRING(ISBN,6,5) || '-' || SUBSTRING(ISBN,13,1) AS ISBN, 書籍名 FROM 書籍
/*** 38. ***/
UPDATE 書籍 SET 発売日=CURRENT_DATE WHERE ISBN='9784295005094'
/*** 39. ***/
SELECT ISBN,書籍名,価格,TRUNC(価格*0.8, 0) AS 値下げした価格 FROM 書籍 WHERE 価格>=5000
/*** 40. ***/
SELECT * FROM 書籍 WHERE 書籍名 LIKE '%PHP%' ORDER BY 価格 DESC OFFSET 0 FETCH FIRST 3 ROWS ONLY
/*** 41. ***/
CREATE TABLE 文房具 (
  商品ID CHAR(7) PRIMARY KEY,
  文具名 VARCHAR(256) UNIQUE NOT NULL,
  価格 INTEGER DEFAULT 0 CHECK(価格>=0),
  分類 INTEGER DEFAULT 4 NOT NULL,
  購入日 DATE NOT NULL
)
/*** 42. ***/
DROP TABLE 文房具
/*** 43. ***/
ALTER TABLE 文房具 ADD メモ VARCHAR(256) DEFAULT '不明' NOT NULL
/*** 44. ***/
ALTER TABLE 文房具 DROP メモ
/*** 45. ***/
INSERT INTO 文房具 (商品ID,文具名,価格,分類,購入日) VALUES ('0000100','鉛筆',100,1,CURRENT_DATE)
