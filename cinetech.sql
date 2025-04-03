CREATE DATABASE IF NOT EXISTS cinetech;
USE cinetech;

CREATE TABLE generos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NULL
);

CREATE TABLE filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    genero_id INT NOT NULL,
    capa VARCHAR(255) NOT NULL,
    trailer VARCHAR(255) NOT NULL,
    data_lancamento DATE NOT NULL,
    duracao INT NOT NULL,
    FOREIGN KEY (genero_id) REFERENCES generos(id) ON DELETE CASCADE
);