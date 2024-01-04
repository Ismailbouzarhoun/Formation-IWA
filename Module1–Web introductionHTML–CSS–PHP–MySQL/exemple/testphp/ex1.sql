CREATE DATABASE IWA1;
USE IWA1;

CREATE TABLE liste_proprietaire (
numero INT(5) NOT NULL AUTO_INCREMENT,
nom VARCHAR(20) NOT NULL,
telephone VARCHAR(14) NOT NULL?
PRIMARY KEY (numero)
);

CREATE TABLE liste_disque (
auteur VARCHAR(50) NOT NULL,
titre VARCHAR(50) NOT NULL,
numero INT(5) NOT NULL
);



CREATE TABLE etudiant2 (
    code  INT (5) NOT NULL,
     nom VARCHAR(20) NOT NULL,
     prenom VARCHAR(20) NOT NULL 
);

INSERT INTO liste_proprietaire VALUES ('', 'ali','06-61-85-20-54');
INSERT INTO liste_proprietaire VALUES ('', 'hamid','06-61-98-78-12');
INSERT INTO liste_proprietaire VALUES ('', 'aziz','06-63-01-59-36');

INSERT INTO liste_disque VALUES( 'Camilia','Amitie','1');
INSERT INTO liste_disque VALUES( 'Daft Punk','A la découverte','1');
INSERT INTO liste_disque VALUES( 'Camilia','Amitie','2');
INSERT INTO liste_disque VALUES( 'Télénor','Monde sans frontières','2');
INSERT INTO liste_disque VALUES( 'Calairis','bonjour','3');
INSERT INTO liste_disque VALUES( 'Bob Dinar','Paradise','2');