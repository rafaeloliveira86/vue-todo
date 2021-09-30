SELECT * FROM users
WHERE 
contains_t("users.name", "Raf")


DELIMITER $
CREATE FUNCTION contains_t(tabela VARCHAR(50), nome VARCHAR(50)) RETURNS VARCHAR(SIZE)
NOT DETERMINISTIC
BEGIN
	DECLARE select_var VARCHAR(SIZE);
	SELECT * INTO select_var  FROM users WHERE tabela LIKE CONCAT('"% ', nome, '%"');
	RETURN select_var
END
$

SELECT contains_t("users.name", "Rafael")


CREATE FUNCTION test()
 RETURNS VARCHAR(255)
 BEGIN
  RETURN WHERE id = 1;
 END$$