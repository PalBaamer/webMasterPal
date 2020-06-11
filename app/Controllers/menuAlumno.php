<?php namespace App\Controllers;

use App\Models\alumnoModelo;
use App\Models\cursoModelo;
use CodeIgniter\Controller;


class menuAlumno extends BaseController{


	public function index(){	
        helper('cookie');
		helper('array');
        
        //CARGAR MENU DEL PROFESOR
       // var_dump('entra en el index de menu profesor');die;
       //OBTIENES LOS DATOS DEL PROFESOR COMPLETO
         
        $cursosM = new cursoModelo();
        $alumnoDatos=$this->datosAlumno();
         //var_dump($alumnoDatos);die;
         $datos['alumnoDatos']=$alumnoDatos;
         $cursos=$this->todos_cursos();
         $datos['cursos']=$cursos;
        $id_alumno=$alumnoDatos->id_alumno;
         $cursosProcesando= $cursosM->cursos_en_proceso($id_alumno);
                    //var_dump("Curso procesado".$cursosProcesando);die;
                   // var_dump($cursosProcesando);die;
                    $datos['cursosProcesando']=$cursosProcesando;

		return view('cabeceraAlumno',$datos).view('menuAlumno',$datos).view('pie');
    }

    public function misCursos(){	
        helper('cookie');
		helper('array');
        
        $cursosM = new cursoModelo();
        $alumnoM = new alumnoModelo();
        //CARGAR MENU DEL PROFESOR
       //var_dump('entra en el index de menu profesor');die;
       //OBTIENES LOS DATOS DEL PROFESOR COMPLETO
         $alumnoDatos = $this->datosAlumno();
         
         //ar_dump($alumnoDatos);die;
         $datos['alumnoDatos']=$alumnoDatos;
         $cursos=$this->todos_cursos();
         $datos['cursos']=$cursos;

        $id_alumno=$alumnoDatos->id_alumno;
        
        $cursosProcesando= $cursosM->cursos_en_proceso_no_vacios($id_alumno);
                    //var_dump("Curso procesado".$cursosProcesando);die;
                    //var_dump($cursosProcesando);die;
        $cursosCompletos= $cursosM->contenido_curso($id_alumno);
        //var_dump($cursosCompletos."           y              ".$cursosProcesando);die;
        //$listaExamenesAlumno=$alumnoM->evaluacion($id_alumno);  
        //$datos['cursosProcesando']=$cursosProcesando;
        $datos['cursosProcesando']=$cursosProcesando;
       $datos['cursosCompletos']=$cursosCompletos;
            //var_dump("LLEGA");die;

		return view('cabeceraAlumno',$datos).view('misCursos',$datos).view('pie');
    }

    

    public function todos_cursos(){
        
        $cursosM = new cursoModelo();	
        $cursos= $cursosM->todo_cursos();
       // var_dump($cursos);die;
        if($cursos!=null){
        //   var_dump($cursos);die;
           return $cursos;
        }else{
            return null;
        }
    }

    public function busca_cursos($id_alumno){
        
        $cursosM = new cursoModelo();	
        $cursos= $cursosM->buscar_cursos($id_alumno);
       // var_dump($cursos);die;
        if($cursos!=null){
        //   var_dump($cursos);die;
           return $cursos;
        }else{
            return null;
        }
    }

    public function datosAlumno(){
        helper('cookie');
        $alumnoDatos = unserialize($this->request->getCookie('datosSesion'));
       //var_dump($alumnoDatos[0]);die;
        return $alumnoDatos[0];
    }




    public function acceso_nuevo_curso(){
        $cursosM = new cursoModelo();	

        $datosAlumno=$this->datosAlumno();
        $datos['alumnoDatos']=$datosAlumno;
        $datos['cursos']=$this->todos_cursos();
         $pswd = $this->request->getVar('clave');
         $id_curso = $this->request->getVar('id_curso');

         if($pswd!=null && $id_curso!=null){
            $id_alumno=$datosAlumno->id_alumno;
            // var_dump($cursoOK);die;
            $cursoOK= $cursosM->comprobar_acceso_curso($pswd,$id_curso,$id_alumno);
            //var_dump($cursoOK);die;
            //LA PSWD Y NO HA CURSADO NUNCA ESTE CURSO ?
            if($cursoOK=="OK"){

                //var_dump(" CURSO OK Y NO INSCRITO ".$cursoOK);die;
                $alumnnoInsertado= $cursosM->insertar_alumno_en_curso($id_alumno,$id_curso);
                if($alumnnoInsertado==0){

                    return view('cabeceraAlumno',$datos).view('menuAlumno',$datos).view('pie');

                }else{
                    var_dump("INSERTADO FAIL".$datos);die;
                    $datos['error']='No has podido acceder al curso,intentalo de nuevo más tarde';
                    //var_dump($datos['error']);die;
                    return view('cabeceraAlumno',$datos).view('menuAlumno',$datos).view('pie');
                }

            }else{

                $datos['error']='Ya estás registrado en el curso o la pswd no es correcta';
    
                //var_dump($datos['error']);die;
                return view('cabeceraAlumno',$datos).view('menuAlumno',$datos).view('pie');
                    
            }
         }else{
            $datos['error']='Los campos no pueden estar vacíos';

            //var_dump($datos['error']);die;
            return view('cabeceraAlumno',$datos).view('menuAlumno',$datos).view('pie');
         }


    }
    public function ver_tema(){
        $cursosM = new cursoModelo();	

        $datosAlumno=$this->datosAlumno();
        $datos['alumnoDatos']=$datosAlumno;

        $id_tema = $this->request->getVar('id_tema');

        $cuerpoTema =$cursosM->ver_tema($id_tema);

        if($cuerpoTema!=null){
            //var_dump("ENTRA");die;
            $datos['tema']=$cuerpoTema[0];
            return view('cabeceraAlumno',$datos).view('tema',$datos).view('pie');

            
        }else{
            $datos['error']='No se ha encontrado el tema ';
            $this->misCursos();

        }
    }

    public function hacer_examen(){
        $cursosM = new cursoModelo();	

        $datosAlumno=$this->datosAlumno();
        $datos['alumnoDatos']=$datosAlumno;
        
        $id_examen = $this->request->getVar('id_examen');
        
        //var_dump($id_examen);die;
        $examen= $cursosM->hacer_examen($id_examen);
        //var_dump($id_examen);die;
        if($examen!=null){
            $datos['examen']=$examen;
            return view('cabeceraAlumno',$datos).view('hacerExamen',$datos).view('pie');

        }else{
            $datos['error']='No se ha podido abrir el examen ';
            $this->misCursos();
        }
    }

    public function empezar_examen(){
        $cursosM = new cursoModelo();	

        $datosAlumno=$this->datosAlumno();
        $datos['alumnoDatos']=$datosAlumno;

        $id_examen = $this->request->getVar('id_examen');
        //var_dump($id_examen);die;
        $examenH= $cursosM->emprezar_examen($id_examen);
        $examen= $cursosM->hacer_examen($id_examen);
        if($examenH!=null){
            $datos['examen']=$examen;
            $datos['examenH']=$examenH;
            return view('cabeceraAlumno',$datos).view('hacerExamen',$datos).view('pie');

        }else{
            $datos['error']='No se ha podido abrir el examen ';
            $this->misCursos();
        }
    }

    public function corregir_examen(){
        //preguntaCorrecta=A
        $cursosM = new cursoModelo();
        //var_dump("LLEGa");die;

        $datosAlumno=$this->datosAlumno();
        $datos['alumnoDatos']=$datosAlumno;
        
        $id_examen = $this->request->getVar('id_examen');
        $n_preguntas = $this->request->getVar('npreguntas');
        $notaAprobar = $this->request->getVar('notaAprobar');
        
        $notaAprobarE=0;
        $notaE=0;
        $notaAprobarE=$notaAprobar;
        //var_dump($notaAprobarE);die;
       //var_dump("N preguntas son :".$n_preguntas);die;
       //var_dump($id_examen);die;
         $respuestasEx= $cursosM->respuestas_correctas($id_examen);
         //var_dump($respuestasEx);die;
            for ($i=0; $i <=$n_preguntas ; $i++) { 
                $respuesta = $this->request->getVar('respuestaExamen'.($i+1));
                $id_preguntaEx = $this->request->getVar('id_pregunta_'.$i);
                //var_dump($id_preguntaEx);die;
              
                $nota = $this->request->getVar('nota_'.$i);
                
              
                //var_dump($respuestasEx[$i]->id_pregunta." y ".$id_preguntaEx);die;
                //COMPROBAR RESP.
               if( $respuestasEx[$i]->id_pregunta==$id_preguntaEx && $respuestasEx[$i]->respuestaA==$respuesta){
                  
                 $notaE=$notaE+$nota;
                 //var_dump("NOTA".$notaE);die;
                }
              }
              //var_dump($notaE);die;
              //var_dump($id_pregunta);die;
              //var_dump("TOTAL".$nota);die;
                 if($notaE>=$notaAprobar){
                    $aprobado="APROBADA CON UN:".$notaE;
                    
                    $guardado=$cursosM->guardar_examen($datosAlumno->id_alumno, $id_examen,$notaE);
                 }else{
                    $aprobado="HAS SUSPENDIDO CON UN:".$notaE;
                 }
                 
                //var_dump($guardado);
              
                //  var_dump($id_examen." -- ".$pregunta." -- ". $respuestaCorrecta." -- ". $respuestaA." -- ".$respuestaB." -- ".$respuestaB." -- ". $nota);die;
                //$id_preguntas = $cursosM->guardar_examen($id_alumno,$id_examen, $pregunta,$respuestaD,$respuestaA,$respuestaB,$respuestaC,);
                
                if($guardado!=0){
                 
                   // var_dump("Ha habido un error");die;
                    $datos['error']='Ha ocurrido un error al guardar el examen, Haz una captura de la pantalla y enviasela al profesor.';

                    //var_dump($datos['error']);die;
                    return view('cabecera').view('menuProfesor',$datos).view('pie');

                }else{
                     
                     $datos['error']=$aprobado;
                     //var_dump("APROBADO".$aprobado);die;
                    // $this->misCursos();
                    // $this->index();
                    helper('cookie');
                    helper('array');
                    
                    $cursosM = new cursoModelo();
                    //CARGAR MENU DEL PROFESOR
                   //var_dump('entra en el index de menu profesor');die;
                   //OBTIENES LOS DATOS DEL PROFESOR COMPLETO
                     $alumnoDatos = $this->datosAlumno();
                     
                     //ar_dump($alumnoDatos);die;
                     $datos['alumnoDatos']=$alumnoDatos;
                     $cursos=$this->todos_cursos();
                     $datos['cursos']=$cursos;
            
                    $id_alumno=$alumnoDatos->id_alumno;
                    $cursosProcesando= $cursosM->cursos_en_proceso_no_vacios($id_alumno);
                                //var_dump("Curso procesado".$cursosProcesando);die;
                                //var_dump($cursosProcesando);die;
                    $cursosCompletos= $cursosM->contenido_curso($id_alumno);     
                    $datos['cursosProcesando']=$cursosProcesando;
                   $datos['cursosCompletos']=$cursosCompletos;
            
                    return view('cabeceraAlumno',$datos).view('misCursos',$datos).view('pie');
                }
        }

        public function notas(){
        helper('cookie');
		helper('array');
        
        $cursosM = new cursoModelo();
        $alumnoM = new alumnoModelo();
        //CARGAR MENU DEL PROFESOR
       //var_dump('entra en el index de menu profesor');die;
       //OBTIENES LOS DATOS DEL PROFESOR COMPLETO
         $alumnoDatos = $this->datosAlumno();
         
         //ar_dump($alumnoDatos);die;
         $datos['alumnoDatos']=$alumnoDatos;
         $alumnoNotas = $alumnoM->obtener_notas($alumnoDatos->id_alumno);

            if($alumnoDatos!=null){
                $datos['alumnoNotas']=$alumnoNotas;
                return view('cabeceraAlumno',$datos).view('notas',$datos).view('pie');
            }else{
                $datos['error']="No has realizado ningún examen";
                $this->misCursos();
            }

        }

        

    


}