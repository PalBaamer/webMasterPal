<?php

use CodeIgniter\Model;

class Alumno_modelo extends Model {
function __construct(){
   parent::__construct();
   $this->load->database();
}


//mysql:host=localhost;dbname=teleinterprete
function existe_email($email){
      $data = $this->db->query("select * from alumno ");

   $this->db->select('email');
   $this->db->where('email', $email);
   $query = $this->db->get('alumno');
   if ($query->num_rows() > 0){
      return 1;
   }
   return 0;
}

function alumno_login($mail, $pswd){
    $data = $this->db->query('select * from alumno where email="'.$mail.'" and pswd="'.$pswd .'"');
   if ($data->num_rows() > 0){

      return $data->row();
   }
   return null;
}