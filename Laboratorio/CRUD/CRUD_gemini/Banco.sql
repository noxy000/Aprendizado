-- 1. Criar o Banco de Dados (se ainda não existir)
CREATE DATABASE IF NOT EXISTS crud_gemini;
USE crud_gemini;

-- 2. Criar a tabela de usuários/pessoas
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100) NOT NULL UNIQUE,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARSET = utf8mb4; 