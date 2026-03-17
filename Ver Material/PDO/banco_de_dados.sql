CREATE DATABASE crudpdo;

USE crudpdo;

CREATE TABLE pessoa (
	id int AUTO_INCREMENT PRIMARY KEY,
    nome varchar(40),
    telefone varchar(15),
    email varchar(50)
) DEFAULT CHARSET = utf8mb4;

USE crudpdo;

INSERT INTO pessoa (nome, telefone, email) VALUES 
('ana', '00000000', 'ana@gmail.com'),
('paulo', '00000000', 'paulo@gmail.com'),
('fernanda', '00000000', 'fernanda@gmail.com'),
('joao', '00000000', 'joao@gmail.com');