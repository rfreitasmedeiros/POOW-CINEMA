CREATE DATABASE cinetech;
USE cinetech;

CREATE TABLE genero (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT
);

CREATE TABLE filme (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    capa VARCHAR(255) NOT NULL,
    trailer VARCHAR(255) NOT NULL,
    data_lancamento DATE NOT NULL,
    duracao INT NOT NULL
);

CREATE TABLE filme_genero (
    filme_id INT,
    genero_id INT,
    PRIMARY KEY (filme_id, genero_id),
    FOREIGN KEY (filme_id) REFERENCES filme(id) ON DELETE CASCADE,
    FOREIGN KEY (genero_id) REFERENCES genero(id) ON DELETE CASCADE
);
