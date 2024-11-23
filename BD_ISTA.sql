CREATE DATABASE ISTA;
USE ISTA;
CREATE TABLE stagiaires (
    matStagiaire INT PRIMARY KEY AUTO_INCREMENT,
    nomStagiaire VARCHAR(100) NOT NULL,
    prenomStagiaire VARCHAR(100) NOT NULL,
    filiereStagiaire VARCHAR(50) NOT NULL,
    anneeEtude YEAR NOT NULL,
    typeBac VARCHAR(50),
    anneeBac YEAR
);
