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


function profesorLogin($email,$pswd){
  // var_dump("estoy en el metodo del Modelo profesor Login");die;
   $db=\Config\Database::connect();
   
   $query = $db->query('SELECT * FROM profesor where email="'.$email.'"and pswd="'.$pswd .'"');
   $results = $query->getResult();
   
   return $results;
    
}

function provincias(){
    $query = $this->db->query('select * from provincia ');
    $results = $query->getResult();
   
   return $results;
}

function insertar_profesor($usuario){
   
   $db=\Config\Database::connect();
  $queryInsert = $db->query('INSERT INTO profesor (nombre,apellido1,apellido2,dni,direccion,provincia,telefono,pswd,email) VALUES("'.$usuario['nombre'].'","'.$usuario['apellido'].'","'.$usuario['apellido2'].'","'.$usuario['dni'].'","'.$usuario['direccion'].'","'.$usuario['provincia'].'","'.$usuario['telefono'].'","'.$usuario['pswd'].'","'.$usuario['email'].'")');
  
   return $queryInsert;
}



}

