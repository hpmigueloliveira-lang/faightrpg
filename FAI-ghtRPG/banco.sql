CREATE DATABASE faight_rpg;
USE faight_rpg;

CREATE TABLE guerreiros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    classe VARCHAR(50) NOT NULL,
    vida INT NOT NULL,
    ataque INT NOT NULL,
    defesa INT NOT NULL
);

INSERT INTO guerreiros (nome, classe, vida, ataque, defesa) 
VALUES ('Merlin', 'Mago', 80, 25, 5);

INSERT INTO guerreiros (nome, classe, vida, ataque, defesa) 
VALUES ('Legolas', 'Arqueiro', 90, 18, 8);

INSERT INTO guerreiros (nome, classe, vida, ataque, defesa) 
VALUES ('Uther', 'Paladino', 110, 15, 15);