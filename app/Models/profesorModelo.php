<?php namespace App\Models;

use CodeIgniter\Model;

class profesorModelo extends Model {

protected $table = "profesor"; 

//protected $DBGroup = 'webmasterpal';
//mysql:host=localhost;dbname=teleinterprete

      function prueba(){
         $db=\Config\Database::connect();
         $query = $db->query('SELECT * FROM profesor ');
         $results = $query->getResult();
         
         return $results;   
      }


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

      function insertar_profesor($usuario){
         
         $db=\Config\Database::connect();
      $queryInsert = $db->query('INSERT INTO profesor (nombre,apellido1,apellido2,dni,direccion,provincia,telefono,pswd,email) VALUES("'.$usuario['nombre'].'","'.$usuario['apellido'].'","'.$usuario['apellido2'].'","'.$usuario['dni'].'","'.$usuario['direccion'].'","'.$usuario['provincia'].'","'.$usuario['telefono'].'","'.$usuario['pswd'].'","'.$usuario['email'].'")');
      
         return $queryInsert;
      }

      function profesor_busca_alumno($nombreAlumno,$id_profesor){
         
         $db=\Config\Database::connect();
      $query = $db->query('SELECT distinct alumno.nombre,alumno.apellido1,alumno.apellido2,alumno.telefono,alumno.email
      from curso,alumno_accede_curso,alumno 
      where curso.id_curso= alumno_accede_curso.id_curso and alumno_accede_curso.id_alumno=alumno.id_alumno and curso.id_profesor ='.$id_profesor.' and alumno.nombre="'.$nombreAlumno.'"'); 
      $results = $query->getResult();
      return $results;
      }

      function curso_y_alumno($id_profesor,$nombreAlumno){
         $db=\Config\Database::connect();
         
      $query = $db->query('SELECT distinct curso.id_curso,curso.nombre,alumno.nombre from curso,alumno_accede_curso,alumno 
      where curso.id_curso= alumno_accede_curso.id_curso and alumno_accede_curso.id_alumno=alumno.id_alumno and curso.id_profesor =$id_profesor and alumno.nombre="'.$nombreAlumno.'"'); 
         return $query;
      }

      function buscar_cursos_y_alumnos($id_profesor){
         $db=\Config\Database::connect();
         
         $query = $db->query('SELECT curso.id_curso,curso.nombre, count(id_alumno)as nAlumnos from curso,alumno_accede_curso where curso.id_curso= alumno_accede_curso.id_curso and curso.id_profesor ='.$id_profesor.' group by id_curso');
         $results = $query->getResult();
      return $results;
      }

      function buscar_cursos($id_profesor){
         $db=\Config\Database::connect();
         
         $query = $db->query('SELECT curso.id_curso,curso.nombre from curso where  curso.id_profesor ='.$id_profesor);
         $results = $query->getResult();
      return $results;
      }

      function seleccion_1_curso($id_profesor,$id_curso){
         $db=\Config\Database::connect();
         
         $query = $db->query('SELECT c.id_curso,c.nombre as nombreCurso ,t.id_tema,t.nombre as nombreTema from curso c join tema t using (id_curso) where c.id_profesor='.$id_profesor.' and c.id_curso='.$id_curso) ;
         $results = $query->getResult();
         return $results;
      }




      function insert_tema($id_curso,$nombre){
         $db=\Config\Database::connect();
         //var_dump($id_curso." en el modulo");die;
         $queryInsert = $db->query('INSERT into tema (nombre,id_curso) values("'.$nombre.'",'.$id_curso.') ');
        //var_dump($id_curso." en el modulo despues del insert");die;
         $id_tema=$db->insertID();
         //insert_id
         return $id_tema;
      }



      function insertar_recurso_html($id_tema,$recurso){

         $db=\Config\Database::connect();
         //var_dump($id_tema. " y ".$recurso );die;
         //var_dump("INSERT into recurso (id_tema,recurso) values (".$id_tema.",'".$recurso."') ");die;
        // var_dump('INSERT into recurso (id_tema,recurso) values ('.$id_tema.',"'.$recurso.'")');die;
         $queryInsert = $db->query("INSERT into recurso (id_tema,recurso)values(".$id_tema.",'".$recurso."')");
         //var_dump($queryInsert);die;
         return $queryInsert;
      }



}

