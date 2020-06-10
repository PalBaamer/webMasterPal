<?php namespace App\Models;

use CodeIgniter\Model;

class profesorModelo extends Model {

protected $table = "profesor"; 

//protected $DBGroup = 'webmasterpal';
//mysql:host=localhost;dbname=teleinterprete

     /* function prueba(){
         $db=\Config\Database::connect();
         $query = $db->query('SELECT * FROM profesor ');
         $results = $query->getResult();
         
         return $results;   
      }*/


      function profesor_login($email,$pswd){
      // var_dump("estoy en el metodo del Modelo profesor Login");die;
         $db=\Config\Database::connect();
         
         $query = $db->query('SELECT * FROM profesor where email="'.$email.'"and pswd="'.$pswd .'"');
         $results = $query->getRowObject();

         
         return $results;
         
      }

      function provincias(){
         $query = $this->db->query('SELECT * from provincia ');
         $results = $query->getResult();
         
         return $results;
      }

       //-------INSERTA UN NUEVO PROFESOR EN LA BBDD
      function insertar_profesor($usuario){
         
         $db=\Config\Database::connect();
      $queryInsert = $db->query('INSERT INTO profesor (nombre,apellido1,apellido2,dni,direccion,provincia,telefono,pswd,email) VALUES("'.$usuario['nombre'].'","'.$usuario['apellido'].'","'.$usuario['apellido2'].'","'.$usuario['dni'].'","'.$usuario['direccion'].'","'.$usuario['provincia'].'","'.$usuario['telefono'].'","'.$usuario['pswd'].'","'.$usuario['email'].'")');
      
         return $queryInsert;
      }

      //-------EL PROFESO BUSCA A UN ALUMNO EN ALGUNO DE SUS CURSOS POR EL NOMBRE;
      function profesor_busca_alumno($nombreAlumno,$id_profesor){
         
         $db=\Config\Database::connect();
      $query = $db->query('SELECT distinct alumno.nombre,alumno.apellido1,alumno.apellido2,alumno.telefono,alumno.email
      from curso,alumno_accede_curso,alumno 
      where curso.id_curso= alumno_accede_curso.id_curso and alumno_accede_curso.id_alumno=alumno.id_alumno and curso.id_profesor ='.$id_profesor.' and alumno.nombre="'.$nombreAlumno.'"'); 
      $results = $query->getResult();
      return $results;
      }

       //-------
      function curso_y_alumno($id_profesor,$nombreAlumno){
         $db=\Config\Database::connect();
         
      $query = $db->query('SELECT distinct curso.id_curso,curso.nombre,alumno.nombre from curso,alumno_accede_curso,alumno 
      where curso.id_curso= alumno_accede_curso.id_curso and alumno_accede_curso.id_alumno=alumno.id_alumno and curso.id_profesor =$id_profesor and alumno.nombre="'.$nombreAlumno.'"'); 
         return $query;
      }

       //-------EL PROFESO BUSCA LOS CURSOS QUE TIENE Y LA CANTIDAD DE ALUMNOS QUE HAY EN ELLOS
      function buscar_cursos_y_alumnos($id_profesor){
         $db=\Config\Database::connect();
         
         $query = $db->query('SELECT curso.id_curso,curso.nombre, count(id_alumno)as nAlumnos from curso,alumno_accede_curso where curso.id_curso= alumno_accede_curso.id_curso and curso.id_profesor ='.$id_profesor.' group by id_curso');
         $results = $query->getResult();
      return $results;
      }

 //-------SELECCIONA TODOS LOS CURSOS DEL PROFESOR
      function buscar_cursos($id_profesor){
         $db=\Config\Database::connect();
         
         $query = $db->query('SELECT curso.id_curso,curso.nombre from curso where  curso.id_profesor ='.$id_profesor);
         $results = $query->getResult();
      return $results;
      }




 //-------SELECCIONA 1 CURSO Y TODOS LOS TEMAS QUE CONTIENE SI ESTÁ VACIO EL CURSO DEVUELVE NULL
      function seleccion_1_curso($id_profesor,$id_curso){
         $db=\Config\Database::connect();
         $query = $db->query('SELECT c.id_curso,c.nombre as nombreCurso ,t.id_tema, t.nombre as nombreTema from curso c join tema t using (id_curso) where c.id_profesor='.$id_profesor.' and c.id_curso='.$id_curso) ;
         
         $results = $query->getResult();
       
         return $results;
      }

 //-------BUSCA SI EL NOMBRE DEL CURSO YA EXISTE
      function buscar_curso($nombreCurso){
         $db=\Config\Database::connect();
         $queryInsert = $db->query('SELECT nombre from curso where nombre ="'.$nombreCurso.'"');
         $results = $queryInsert->getResult();
         
         if($results==null || isset($results)==false){
            return null;
         }else{

            return $results;
         }

      }

       //-------BUSCA SI EL ID DEL CURSO YA EXISTE
       function buscar_cursoID($id_curso){

         $db=\Config\Database::connect();
         $query = $db->query('SELECT nombre from curso where id_curso ='.$id_curso.'');
         $results = $query->getResult();
         
         if($results==null || isset($results)==false){
            return null;
         }else{

            return $results=$results[0]->nombre;
         }

      }


 //-------EL PROFESO BUSCA CREA UN NUEVO CURSO
      function insert_curso($nombre_Curso, $id_profesor){
         $db=\Config\Database::connect();
         
         $queryInsert = $db->query('INSERT into curso (nombre,id_profesor)values("'.$nombre_Curso.'",'.$id_profesor.')');
         $id_tema=$db->insertID();
         //insert_id
         return $id_tema;

      }

       //-------EL PROFESO BUSCA A UN ALUMNO EN ALGUNO DE SUS CURSOS POR EL NOMBRE;



      function insert_tema($id_curso,$nombre){
         $db=\Config\Database::connect();
         
         //var_dump($id_curso." en el modulo");die;
         $queryInsert = $db->query('INSERT into tema (nombre,id_curso) values("'.$nombre.'","'.$id_curso.'") ');
        //var_dump($id_curso." en el modulo despues del insert");die;
        
         $id_tema=$db->insertID();
         //insert_id
         return $id_tema;
      }

     


      function insertar_tema($id_curso,$nombreTema,$htmlTexto){

         $db=\Config\Database::connect();
         //var_dump($id_tema. " y ".$recurso );die;
        // var_dump("INSERT into tema (nombre, id_curso,cuerpo_tema)values('".$nombreTema."',".$id_curso.",'".$htmlTexto."')");die;
         //var_dump($id_curso.' - '.$nombreTema.' - '.$htmlTexto);die;
         $queryInsert = $db->query("INSERT into tema (nombre, id_curso,cuerpo_tema)values('".$nombreTema."',".$id_curso.",'".$htmlTexto."')");
         //var_dump($queryInsert);die;
         return $queryInsert;
      }

      function borrar_tema($id_tema){
         $db=\Config\Database::connect();
         //var_dump("en el modelo es id_tema es :".$id_tema);die;
         $query = $db->query("DELETE from examen where id_tema=".$id_tema."");
         $query = $db->query("DELETE from tema where id_tema=".$id_tema."");
         
         $results = $query->getResult();
         return $results;
      }


      function insertar_examen($id_tema , $tiempo, $notaMinima,$notaMaxima){
         $db=\Config\Database::connect();
         //var_dump($id_tema. " y ".$recurso );die;
        //var_dump("INSERT into examen (id_tema, puntos_para_aprobar,tiempo_examen)values(".$id_tema.",".$nota.",'".$tiempo."')");die;
         //var_dump($id_curso.' - '.$nombreTema.' - '.$htmlTexto);die;
         $queryInsert = $db->query(" INSERT into examen (id_tema, puntos_para_aprobar,tiempo_examen,total_examen)values($id_tema,$notaMinima,'".$tiempo."',$notaMaxima)");
         $id_tema=$db->insertID();
         return $id_tema;
        
      }

      public function crear_pregunta($id_examen, $pregunta,$respuestaA,$respuestaB,$respuestaC,$respuestaD,$nota){
         $db=\Config\Database::connect();
        //("INSERT into preguntas values(".$id_examen.",'".$pregunta."','".$respuestaA."','".$respuestaB."','".$respuestaC."','".$respuestaCorrecta."',".$nota.")");die;
         $queryInsert = $db->query(" INSERT into preguntas values(".$id_examen.",'".$pregunta."','".$respuestaA."','".$respuestaB."','".$respuestaC."','".$respuestaD."',".$nota.")");
         $results = $db->insertID();
        // var_dump($results );die;
         return $results;


      }

      public function obtener_temas_examen($id_curso){
         $db=\Config\Database::connect();
        // var_dump("select tema.id_tema, tema.nombre, examen.id_examen from tema, examen where examen.id_tema=tema.id_tema and tema.id_curso=".$id_curso.";");die;
         $query = $db->query("SELECT t.id_tema, t.nombre, e.id_examen from tema t left join examen e on(e.id_tema=t.id_tema) where t.id_curso=".$id_curso."");

         $results = $query->getResult();
        //var_dump($results);die;
         return $results;

      }

      public function preguntas_tema($id_examen){
         $db=\Config\Database::connect();
         // var_dump("select tema.id_tema, tema.nombre, examen.id_examen from tema, examen where examen.id_tema=tema.id_tema and tema.id_curso=".$id_curso.";");die;
          $query = $db->query("SELECT * from preguntas where id_examen=".$id_examen." order by rand()");
          
          $results = $query->getResult();
         //var_dump($results);die;
          return $results;

      }
      public function examen($id_examen){
         $db=\Config\Database::connect();
         // var_dump("select tema.id_tema, tema.nombre, examen.id_examen from tema, examen where examen.id_tema=tema.id_tema and tema.id_curso=".$id_curso.";");die;
          $query = $db->query("SELECT * from examen where id_examen=".$id_examen."");
 
          $results = $query->getResult();
         //var_dump($results);die;
          return $results;

      }

      public function examen_borrar($id_examen){
         $db=\Config\Database::connect();
         //var_dump("en el modelo es id_tema es :".$id_tema);die;
         $query = $db->query("DELETE from preguntas where id_examen=".$id_examen."");
         $query = $db->query("DELETE from examen where id_examen=".$id_examen."");
         
         $results = $query->getResult();
         return $results;


      }


}

