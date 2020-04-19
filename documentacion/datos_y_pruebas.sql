
----Obtiene el id y nombres de profesor, curso y alumno de cada asignatura matriculados
select distinct curso.id_profesor ,profesor.nombre , curso.id_curso, curso.nombre, alumno.id_alumno, alumno.nombre 
from profesor,curso,alumno ,alumno_accede_curso
where profesor.id_profesor=curso.id_profesor and curso.id_curso=alumno_accede_curso.id_curso and alumno_accede_curso.id_alumno = alumno.id_alumno;

----Los cursos que tiene el profesor =1-----
select * from curso,alumno_accede_curso where curso.id_curso= alumno_accede_curso.id_curso and curso.id_profesor =1;

select curso.id_curso,curso.nombre, count(id_alumno)as nAlumnos from curso,alumno_accede_curso where curso.id_curso= alumno_accede_curso.id_curso and curso.id_profesor =1 group by id_curso;

---------

---Seleciona los alumnos en los cursos que imparte el profesor con id =3----

select distinct curso.id_curso,curso.nombre,alumno.nombre 
from curso,alumno_accede_curso,alumno 
where curso.id_curso= alumno_accede_curso.id_curso and alumno_accede_curso.id_alumno=alumno.id_alumno and curso.id_profesor =3 ;


--------

---Selecciona el alumno "ramona" que está haciendo los cursos del profe 3-----
select distinct curso.id_curso,curso.nombre,alumno.nombre 
from curso,alumno_accede_curso,alumno 
where curso.id_curso= alumno_accede_curso.id_curso and alumno_accede_curso.id_alumno=alumno.id_alumno and curso.id_profesor =3 and alumno.nombre="ramona";

---Seleciona los alumnos en el PHP(4) curso que imparte el profesor con id =3----

select distinct curso.id_curso,curso.nombre,alumno.nombre 
from curso,alumno_accede_curso,alumno 
where curso.id_curso= alumno_accede_curso.id_curso and alumno_accede_curso.id_alumno=alumno.id_alumno and curso.id_profesor =1 and curso.id_curso =4;

----Datos alumno X que está en el curso del profesor X;
select distinct alumno.nombre,alumno.apellido1,alumno.apellido2,alumno.telefono,alumno.email
from curso,alumno_accede_curso,alumno 
where curso.id_curso= alumno_accede_curso.id_curso and alumno_accede_curso.id_alumno=alumno.id_alumno and curso.id_profesor =1 and alumno.nombre="ramona";

-------Selecciona del id_curos X los temas y lecciones que tiene--------





insert into alumno values(3,'Basi','Lisa','Cano','00000000A','Basi','1234basi','basi@basi.com');
insert into alumno values(4,'Ramona','Ruiz','Hermosa','11111111B','Ramona','1234ramona','ramona@ramona.com');

insert into alumno_accede_curso values(4,1);
insert into alumno_accede_curso values(2,4);
insert into alumno_accede_curso values(2,1);


CREATE TABLE autonomia (
  id_autonomia int(3) NOT NULL AUTO_INCREMENT,
  nombre varchar(50),
   PRIMARY KEY (id_autonomia)
);

CREATE TABLE provincia(
id_provincia int(3) NOT NULL AUTO_INCREMENT,
id_autonomia int(3),
nombre varchar(80),
 PRIMARY KEY (id_provincia),
 CONSTRAINT provincias_tiene_ciudades FOREIGN KEY (id_autonomia) REFERENCES autonomia(id_autonomia)
);

INSERT INTO autonomia VALUES(1,'Andalucia');
INSERT INTO autonomia VALUES(2,'Aragon');
INSERT INTO autonomia VALUES(3,'Asturias');
INSERT INTO autonomia VALUES(4,'Islas Baleares');
INSERT INTO autonomia VALUES(5,'Canarias');
INSERT INTO autonomia VALUES(6,'Cantabria');
INSERT INTO autonomia VALUES(7,'Castilla y Leon');
INSERT INTO autonomia VALUES(8,'Castilla la Mancha');
INSERT INTO autonomia VALUES(9,'Cataluna');
INSERT INTO autonomia VALUES(10,'Comunidad Valenciana');
INSERT INTO autonomia VALUES(11,'Extremadura');
INSERT INTO autonomia VALUES(12,'Galicia');
INSERT INTO autonomia VALUES(13,'Comunidad de Madrid');
INSERT INTO autonomia VALUES(14,'Murica');
INSERT INTO autonomia VALUES(15,'Navarra');
INSERT INTO autonomia VALUES(16,'Pais Vasco');
INSERT INTO autonomia VALUES(17,'La Rioja');
INSERT INTO autonomia VALUES(18,'Ceuta');
INSERT INTO autonomia VALUES(19,'Melilla');


INSERT INTO provincia VALUES(02,8,'Albacete');
INSERT INTO provincia VALUES(10,11,'Cáceres');
INSERT INTO provincia VALUES(11,1,'Cádiz');
INSERT INTO provincia VALUES(12,10,'Castellón/Castelló');
INSERT INTO provincia VALUES(13,8,'Ciudad Real');
INSERT INTO provincia VALUES(14,1,'Córdoba');
INSERT INTO provincia VALUES(15,12,'Coruña, A');
INSERT INTO provincia VALUES(16,8,'Cuenca');
INSERT INTO provincia VALUES(17,9,'Girona');
INSERT INTO provincia VALUES(18,1,'Granada');
INSERT INTO provincia VALUES(19,8,'Guadalajara');
INSERT INTO provincia VALUES(20,16,'Gipuzkoa');
INSERT INTO provincia VALUES(21,2,'Huelva');
INSERT INTO provincia VALUES(22,2,'Huesca');
INSERT INTO provincia VALUES(23,1,'Jaén');
INSERT INTO provincia VALUES(24,7,'León');
INSERT INTO provincia VALUES(25,9,'Lleida');
INSERT INTO provincia VALUES(26,17,'Rioja, La');
INSERT INTO provincia VALUES(27,12,'Lugo');
INSERT INTO provincia VALUES(28,13,'Madrid');
INSERT INTO provincia VALUES(29,1,'Málaga');
INSERT INTO provincia VALUES(30,14,'Murcia');
INSERT INTO provincia VALUES(31,15,'Navarra');
INSERT INTO provincia VALUES(32,12,'Ourense');
INSERT INTO provincia VALUES(33,3,'Asturias');
INSERT INTO provincia VALUES(34,7,'Palencia');
INSERT INTO provincia VALUES(35,4,'Palmas, Las');
INSERT INTO provincia VALUES(36,12,'Pontevedra');
INSERT INTO provincia VALUES(37,4,'Salamanca');
INSERT INTO provincia VALUES(38,5,'Santa Cruz de Tenerife');
INSERT INTO provincia VALUES(39,6,'Cantabria');
INSERT INTO provincia VALUES(40,7,'Segovia');
INSERT INTO provincia VALUES(41,1,'Sevilla');
INSERT INTO provincia VALUES(42,7,'Soria');
INSERT INTO provincia VALUES(43,9,'Tarragona');
INSERT INTO provincia VALUES(44,2,'Teruel');
INSERT INTO provincia VALUES(45,8,'Toledo');
INSERT INTO provincia VALUES(46,10,'Valencia/València');
INSERT INTO provincia VALUES(47,7,'Valladolid');
INSERT INTO provincia VALUES(48,16,'Bizkaia');
INSERT INTO provincia VALUES(49,2,'Zamora');
INSERT INTO provincia VALUES(50,7,'Zaragoza');
INSERT INTO provincia VALUES(51,18,'Ceuta');
INSERT INTO provincia VALUES(52,19,'Melilla');
INSERT INTO provincia VALUES(01,16,'Araba/Álava');
INSERT INTO provincia VALUES(03,10,'Alicante/Alacant');
INSERT INTO provincia VALUES(04,1,'Almería');
INSERT INTO provincia VALUES(05,7,'Ávila');
INSERT INTO provincia VALUES(06,11,'Badajoz');
INSERT INTO provincia VALUES(07,4,'Balears, Illes');
INSERT INTO provincia VALUES(08,9,'Barcelona');
INSERT INTO provincia VALUES(09,7,'Burgos');

select * from provincia, autonomia where provincia.id_autonomia =autonomia.id_autonomia and provincia.id_autonomia=4 order by id_provincia asc;
 
update provincia set id_autonomia=4 where id_provincia=7;

alter table profesor add telefono int(9) after telefono;
alter table profesor drop direccion;

alter table tema add nombre varchar(35) after id_tema;
insert into tema values(1,"Introducción",2);
alter table tema MODIFY nombre varchar(35);
insert into curso values(5,"Manejo Windows",1);
insert into tema values(1,"Introducción",5);
insert into tema(nombre,id_curso)values("Papelera",5);
insert into tema(nombre,id_curso)values("Disco dduro y USB",5);
insert into tema(nombre,id_curso)values("Google",5);
insert into tema(nombre,id_curso)values("Gmail",5);
insert into tema(nombre,id_curso)values("Fotos_google",5);
insert into tema(nombre,id_curso)values("Ubicacion_google",5);

insert into tema (nombre,id_curso)values("Introduccion",2);
insert into tema (nombre,id_curso)values("Variables",2);
select c.id_curso,c.nombre as nombreCurso ,t.id_tema,t.nombre as nombreTema 
from curso c join tema t using (id_curso) where c.id_profesor=1 and c.id_curso=5 ;

delete from tema where id_tema=1;

select * from INFORMATION_SCHEMA.TABLE_CONSTRAINTS WHERE TABLE_NAME='leccion';

alter table recurso drop foreign key recurso_del_tema;
alter table leccion drop foreign key primary;
alter table leccion drop primary key PRIMARY;
alter table leccion drop constraint PRIMARY;

alter table recurso drop id_leccion;
ALTER TABLE recurso add id_tema int(3)not null after id_recurso;
ALTER TABLE recurso ADD constraint recurso_pertenece_tema FOREIGN KEY (id_tema) REFERENCES tema(id_tema);

alter table recurso modify column recurso recurosHTML longtext;
alter table recurso MODIFY recurso LONGTEXT;
ALTER COLUMN id_leccion id_tema LONGTEXT;

insert into recurso ( id_tema,recurso)values(18,"<!doctype html>
<html >  <head>
  <title>webMasterPal</title>
  </head>
<body>
	<div class='container'>
	prueba discoDuros y USB
	</div>
	</body>
	</html>");


insert into recurso values(1,17,"<!doctype html>
<html lang='es'>  <head>
  <title>webMasterPal</title>
  </head>
<body>
	<div class='container'>
	hola
	</div>
	</body>
	</html>");

insert into recurso (id_tema,recurso)values(12,"<!doctype html>
<html lang='es'>  <head>
  <title>webMasterPal</title>
  </head>
<body>
	<div class='container'>
	prueba discoDuros y USB
	</div>
	</body>
	</html>");




























<script type="text/javascript">
		$(document).ready(function(){
			$('#txtContent').Editor();

			$('#txtContent').Editor('setText', ['<p style="color:red;">Hola</p>']);

			$('#btn-enviar').click(function(e){
				e.preventDefault();
				$('#txtContent').text($('#txtContent').Editor('getText'));
				$('#frm-test').submit();				
			});
		});	
	</script>

    <!-- Custom styles for this template -->
  </head>

<body class="text-center">
<a href="<?php echo site_url('menuProfesor/index'); ?>" class="btn btn-secondary btn-lg " tabindex="-1" role="button" aria-disabled="true">Atrás</a>

<input id="id_curso" name="id_curso" type="hidden" value="<?php echo $id_curso ?>">
    <div class="container">
		<div class="row">
			<div class="col-sm-8">
                <form action="<?php echo site_url('menuProfesor/pruebaHTML'); ?>" method="post" id="frm-test">
					<div class="form-group">
						<textarea id="txtContent" name="txtContent"></textarea>
                    
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" >Enviar</button>


                    
                </form>
			</div>
        </div>
