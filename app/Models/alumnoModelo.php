<?php namespace App\Models;

use CodeIgniter\Model;

class alumnoModelo extends Model {
      /*function __construct(){
         parent::__construct();
         $this->load->database();
      }*/


      //mysql:host=localhost;dbname=teleinterprete
      function alumnoLogin($email,$pswd){
         $db=\Config\Database::connect();
         
         $query = $db->query('SELECT * FROM alumno where email="'.$email.'"and pswd="'.$pswd .'"');
         $results = $query->getResult();
         
         return $results;
         
      }


      function insertar_alumno($usuario){
         $db=\Config\Database::connect();
         
      $queryInsert = $db->query('INSERT INTO alumno (nombre,apellido1,apellido2,dni,direccion,provincia,telefono,email,pswd) VALUES("'.$usuario['nombre'].'","'.$usuario['apellido'].'","'.$usuario['apellido2'].'","'.$usuario['dni'].'","'.$usuario['direccion'].'","'.$usuario['provincia'].'","'.$usuario['telefono'].'","'.$usuario['email'].'","'.$usuario['pswd'].'")');
      
         return $queryInsert;
      }


      function evaluacion ($id_alumno){
         $db=\Config\Database::connect();

         $query = $db->query('SELECT * FROM evaluacion where  id_alumno="'.$id_alumno);
         $results = $query->getResult();
         
         return $results;

      }

      function obtener_notas ($id_alumno){
         $db=\Config\Database::connect();

         $query = $db->query('select distinct curso.nombre,tema.nombre,examen.puntos_para_aprobar,evaluacion.nota 
      from evaluacion join examen on(evaluacion.id_examen=examen.id_examen) left join tema on (tema.id_tema=examen.id_tema) right join curso on (tema.id_curso=curso.id_curso) 
      where evaluacion.id_alumno="'.$id_alumno);
      $results = $query->getResult();
         
         return $results;

      }
}

