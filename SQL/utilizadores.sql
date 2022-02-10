CREATE TABLE utilizadores (
 nome_utilizador VARCHAR(128) NOT NULL,
 email VARCHAR(16) NOT NULL,
 palavra_passe VARCHAR(18) NOT NULL,
 id_utilizador CHAR(13) NOT NULL,
 PRIMARY KEY (id_utilizador)) ENGINE InnoDB;