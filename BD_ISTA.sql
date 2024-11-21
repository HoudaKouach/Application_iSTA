create database ISTA ;
USE ISTA;
Create table stagiaire (
matStagiaire int  AUTO_INCREMENT ,
nomStagiaire varchar(20) ,
prenomStagiaire varchar(20),
filiereStagaire varchar(20),
anneeEtude varchar(20),
typeBac varchar(20),
anneBac varchar(20),
primary key (matStagiaire)
);
