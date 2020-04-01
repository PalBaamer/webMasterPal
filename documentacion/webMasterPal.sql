-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2019 a las 18:42:43
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10
--C:/Users/usuario/Documents/PROYECTO2020/webMasterPal.sql
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webMasterPal`
--

-- --------------------------------------------------------


CREATE TABLE Profesor(
id_profesor int (3) AUTO_INCREMENT primary key,
nombre varchar(20)NOT NULL,
apellido1 varchar (30),
apellido2 varchar (20),
dni varchar (9),
usuario varchar (30),
pswd varchar (30)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE Curso(
id_curso int (3) AUTO_INCREMENT primary key,
nombre varchar(20)NOT NULL,
id_profesor int (3)NOT NULL,
constraint prof_responsable_curso foreign key (id_profesor) references Profesor(id_profesor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE Alumno(
id_alumno int (3) AUTO_INCREMENT primary key,
nombre varchar(20)NOT NULL,
apellido1 varchar (30),
apellido2 varchar (20),
dni varchar (9),
usuario varchar (30),
pswd varchar (30)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE Alumno_accede_curso(
id_alumno int (3),
id_curso int (3),
constraint alumno_tiene_curso foreign key (id_alumno) references Alumno(id_alumno),
constraint curso_tiene_alumno foreign key (id_curso) references Curso(id_curso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into Profesor VALUES(1,"Mirem","Flores","Vall","64321569L","","");
insert into Profesor VALUES(2,"Pepe","Bernardo","Smith","33266485F","","");
insert into Profesor VALUES(3,"MJ","Rodriguez","Velazquez","75489634T","","");

insert into Curso VALUES(1,"Desarrollo_cliente",3);
insert into Curso VALUES(2,"Java",1);
insert into Curso VALUES(3,"Python",3);
insert into Curso VALUES(4,"PHP",1);

insert into Alumno VALUES(1,"Paloma","Baameiro","Ruiz","64321569L","Pal","1234");
insert into Alumno VALUES(2,"Malena","Baameiro","Ruiz","X987236742","Male","1234");

insert into Alumno_accede_curso VALUES(1,4);
insert into Alumno_accede_curso VALUES(2,2);

insert into Tema VALUES(1,,);

CREATE TABLE Tema(
id_tema int (3) AUTO_INCREMENT primary key,
id_curso int (3),
constraint tema_pertenece_curso foreign key (id_curso) references Curso(id_curso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Leccion(
id_leccion int (3) AUTO_INCREMENT primary key,
id_tema int (3),
estructura varchar(12000),
constraint leccion_del_tema foreign key (id_tema) references Tema(id_tema)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE Recurso(
id_recurso int (3) AUTO_INCREMENT primary key,
id_leccion int (3),
recurso varchar(12000),
constraint recurso_del_tema foreign key (id_leccion) references Leccion(id_leccion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE Examen(
id_examen int (3) AUTO_INCREMENT primary key,
id_alumno int (3),
id_tema int (3),
constraint alumno_hace_examen foreign key (id_alumno) references Alumno(id_alumno),
constraint examen_del_tema foreign key (id_tema) references Tema(id_tema)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE Preguntas(
id_pregunta int (3) AUTO_INCREMENT primary key,
id_examen int (3),
pregunta varchar (400),
respuesta varchar(400),
respuesta_correcta varchar(400),
puntos int (2),
nota int (2),
constraint pregunta_pertenece_examen foreign key (id_examen) references Examen(id_examen)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Evaluacion(
id_alumno int (3),
id_examen int (3),
constraint alumno_tiene_notas foreign key (id_alumno) references Alumno(id_alumno),
constraint examen_pertenece_alumno foreign key (id_examen) references Examen(id_examen)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;









