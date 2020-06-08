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
        
        //CARGAR MENU DEL PROFESOR
       // var_dump('entra en el index de menu profesor');die;
       //OBTIENES LOS DATOS DEL PROFESOR COMPLETO
         $alumnoDatos = $this->datosAlumno();
         
        $cursosM = new cursoModelo();
         //ar_dump($alumnoDatos);die;
         $datos['alumnoDatos']=$alumnoDatos;
         $cursos=$this->todos_cursos();
         $datos['cursos']=$cursos;
        $id_alumno=$alumnoDatos->id_alumno;
        $cursosProcesando= $cursosM->cursos_en_proceso_no_vacios($id_alumno);
                    //var_dump("Curso procesado".$cursosProcesando);die;
                   // var_dump($cursosProcesando);die;
        $cursosCompletos= $cursosM->contenido_curso($id_alumno);     
        $datos['cursosProcesando']=$cursosProcesando;
       $datos['cursosCompletos']=$cursosCompletos;

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


}