CREATE DATABASE IF NOT EXISTS bigec;

# la creation des tables de la base de donnée

CREATE TABLE t_client 
(
    id_client INT PRIMARY KEY AUTO_INCREMENT,
    prenom    VARCHAR(60) NOT NULL,
    nom       VARCHAR(60) NOT NULL,
    email     VARCHAR(100) NOT NULL,
    adresse  VARCHAR(60) NOT NULL,
    numero    INT NOT NULL,
    mdp       VARCHAR(80),
    id_new INT
);


CREATE TABLE t_admin
(
    id_admin INT PRIMARY KEY AUTO_INCREMENT,
    nom      VARCHAR(60),
    prenom   VARCHAR(60),
    email    VARCHAR(100),
    mdp      VARCHAR(80),
    id_salle INT
);


CREATE TABLE t_avis 
(
    id_avis   INT PRIMARY KEY AUTO_INCREMENT,
    contenu   TEXT NOT NULL,
    id_client INT,
    id_salle  INT
);

CREATE TABLE t_salle
(
    id_salle INT,
    ville   VARCHAR(60) NOT NULL,
    quartier VARCHAR(60) NOT NULL,
    prix INT NOT NULL ,
    descrip TEXT NOT NULL,
    photo VARCHAR(80)
);

CREATE TABLE t_newsletter
(
    id_new INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(50) NOT NULL,
    contenu TEXT NOT NULL,
    id_admin INT
);

CREATE TABLE t_reservation 
(
    id_reservation INT PRIMARY KEY AUTO_INCREMENT,
    heure   TIME NOT NULL,
    date_r  date NOT NULL,
    id_salle    INT,
    id_client INT
);


CREATE TABLE t_contact
(
    id_contact  INT PRIMARY KEY AUTO_INCREMENT, 
    nom     VARCHAR(60) NOT NULL,
    email   VARCHAR(100) NOT NULL,
    sujet   VARCHAR(40) NOT NULL, 
    contenu TEXT NOT NULL
);