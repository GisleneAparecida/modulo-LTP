-- Cria um banco para o exemplo simples
CREATE DATABASE IF NOT EXISTS crud_simples CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE crud_simples;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  sobrenome VARCHAR(150),
  email VARCHAR(150),
  endereco VARCHAR(50),
  telefone VARCHAR(11)
);
