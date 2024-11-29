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
USE ISTA;
Create table absences(
idAbsence INT primary KEY auto_increment,
nombreHeure INT NOT NULL,
DateAbsence date NOT NULL ,
Justifie boolean Not null ,
matStagiaire INT ,
foreign key (matStagiaire) references stagiaires(matStagiaire)
);