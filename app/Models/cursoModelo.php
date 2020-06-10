<?php namespace App\Models;

use CodeIgniter\Model;

class cursoModelo extends Model {

    //------------------------------ENSEÑAR TODOS LOS CURSOS
function todo_cursos(){
   $db=\Config\Database::connect();
   //var_dump("ENTRa");die;
   $query = $db->query('SELECT * FROM curso');
   $results = $query->getResult();
   //var_dump($results);die;
   return $results;
    
}

function comprobar_acceso_curso($pswd,$id_curso,$id_alumno){
    $db=\Config\Database::connect();
    //CONSTRASEÑA CORRECTA
    $query = $db->query('SELECT id_curso,nombre FROM curso where pswd='.$pswd.' and id_curso='.$id_curso.'');
    $results = $query->getResult();
    //var_dump($results);die;
    if($results!=null){
        //var_dump('SELECT * FROM alumno_accede_curso where id_alumno='.$id_alumno.' and id_curso='.$id_curso.'');die;
        //EL ALUMNO NO HA HECHO NUNCA ESTE CURSO
        $query2 = $db->query('SELECT * FROM alumno_accede_curso where id_alumno='.$id_alumno.' and id_curso='.$id_curso.'');
        $results2 = $query2->getResult();
        //var_dump($results2);die;
        if(empty($results2)){
           //var_dump("cero");die;
            return "OK";
        }else{
            //var_dump("distinto cero");die;
            return null;
        }
    }
    return null;
}

function insertar_alumno_en_curso($id_curso,$id_alumno){
    $db=\Config\Database::connect();
    //var_dump('INSERT into alumno_accede_curso values('.$id_curso.','.$id_alumno.')');die;
    $queryInsert = $db->query('INSERT into alumno_accede_curso values('.$id_curso.','.$id_alumno.')');
     $results = $db->insertID();
   // var_dump($results );die;
    return $results;

}

function buscar_curso_en_proceso($id_alumno,$id_curso){
    $db=\Config\Database::connect();
   var_dump('SELECT * FROM alumno_accede_curso where id_alumno='.$id_alumno.' and id_curso='.$id_curso.'');die;
    $query = $db->query('SELECT * FROM alumno_accede_curso where id_alumno='.$id_alumno.' and id_curso='.$id_curso.'');
    $results = $query->getResult();
    return $results;
}

function cursos_en_proceso($id_alumno){
    $db=\Config\Database::connect();
    //var_dump('SELECT * FROM alumno_accede_curso where id_alumno='.$id_alumno.'');die;
     $query = $db->query('SELECT c.nombre as nombre  FROM alumno_accede_curso aac join curso c on(aac.id_curso=c.id_curso) where aac.id_alumno='.$id_alumno.'');
     $results = $query->getResult();
     //$results = $query->getResultArray();
    // var_dump($results);die;
     return $results;
}

function cursos_en_proceso_no_vacios($id_alumno){
    $db=\Config\Database::connect();
    //var_dump('SELECT * FROM alumno_accede_curso where id_alumno='.$id_alumno.'');die;
     $query = $db->query('SELECT distinct c.id_curso,c.nombre from alumno_accede_curso acc join curso c on(acc.id_curso=c.id_curso) join tema t on(c.id_curso=t.id_curso)
                        where acc.id_alumno='.$id_alumno.'  and cuerpo_tema is not null order by c.nombre');
     $results = $query->getResult();
     //$results = $query->getResultArray();
    // var_dump($results);die;
     return $results;
}

function contenido_curso($id_alumno){
    //var_dump($id_alumno);die;
    $db=\Config\Database::connect();
    //var_dump('SELECT distinct curso.id_curso as id_curso,tema.id_tema,tema.nombre, tema.cuerpo_tema from alumno_accede_curso,curso,tema where alumno_accede_curso.id_alumno='.$id_alumno.' and curso.id_curso=tema.id_curso and cuerpo_tema is not null order by curso.nombre');die;
    $query = $db->query('SELECT distinct c.id_curso as id_curso,t.id_tema,t.nombre,e.id_examen from alumno_accede_curso acc join curso c on(acc.id_curso=c.id_curso) join tema t on(c.id_curso=t.id_curso) left join examen e on(e.id_tema=t.id_tema)
    where acc.id_alumno=4 and  cuerpo_tema is not null order by c.nombre');
    // var_dump($query);die;
     $results = $query->getResult();
     //$results = $query->getResultArray();
     
     return $results;
}

function ver_tema($id_tema){
    $db=\Config\Database::connect();
    //var_dump("LLEGA");die;
   //var_dump("SELECT cuerpo_tema from tema where id_tema=".$id_tema."");die;
    $query = $db->query("SELECT * from tema where id_tema=".$id_tema."");
   
    $results = $query->getResult();
    //var_dump($results);die;
    return $results;
 }


 function hacer_examen($id_examen){
    $db=\Config\Database::connect();
   // var_dump('SELECT id_examen,tiempo_examen,puntos_para_aprobar,total_examen from examen where id_examen='.$id_examen);die;
    $query = $db->query('SELECT id_examen,tiempo_examen,puntos_para_aprobar,total_examen from examen where id_examen='.$id_examen);
    $results = $query->getResult();
    return $results;
    
 }
 function emprezar_examen($id_examen){
    $db=\Config\Database::connect();
    //var_dump('SELECT * from examen join preguntas on(examen.id_examen=preguntas.id_examen) where preguntas.id_examen='.$id_examen.'');die;
    $query = $db->query('SELECT * from examen join preguntas on(examen.id_examen=preguntas.id_examen) where preguntas.id_examen='.$id_examen.'');
    $results = $query->getResult();
    return $results;

 }


 function guardar_examen($id_alumno, $id_examen,$nota){
    $db=\Config\Database::connect();
    //var_dump('INSERT into evaluacion values('.$id_alumno.','.$id_examen.','.$nota.')');die;
    $queryInsert = $db->query('INSERT into evaluacion values('.$id_alumno.','.$id_examen.','.$nota.')');
     $results = $db->insertID();
   // var_dump($results );die;
    return $results;

 }

 function respuestas_correctas($id_examen){
    $db=\Config\Database::connect();
    //var_dump('SELECT id_pregunta,respuestaA from preguntas where preguntas.id_examen='.$id_examen);die;
    $query = $db->query('SELECT id_pregunta,respuestaA from preguntas where preguntas.id_examen='.$id_examen.'');
    $results = $query->getResult();
    return $results;

 }
}