<?php namespace App\Controllers;

use App\Models\alumnoModelo;
use App\Models\profesorModelo;
use CodeIgniter\Controller;


class menuProfesor extends BaseController{


	public function index(){	
        helper('cookie');
		helper('array');
        
        //CARGAR MENU DEL PROFESOR
       // var_dump('entra en el index de menu profesor');die;
       //OBTIENES LOS DATOS DEL PROFESOR COMPLETO
         $profesorDato = unserialize($this->request->getCookie('datosSesion'));
         $datos['profesorDatos']=$profesorDato;
         $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($profesorDato->id_profesor);
        $datos['cursos']=$this->buscar_curso($profesorDato->id_profesor);
		return view('cabecera').view('menuProfesor',$datos);
    }


    public function recuperar_cookie(){
        $profesorDato = unserialize($this->request->getCookie('datosSesion'));
        return $profesorDato;
    }
    public function id_profesor(){
        $profesorDato = unserialize($this->request->getCookie('datosSesion'));
        $id=$profesorDato->id_profesor;

        return $id;

    }
    	 
    public function buscar_cursos_y_alumnos($id_profesor){
        
        $profesorM = new profesorModelo();	
       // var_dump($id_profe);die;
        $cursos= $profesorM->buscar_cursos($id_profesor);
       // var_dump($cursos);die;
        if($cursos!=null){
        //   var_dump($cursos);die;
           $cursos;
           return $cursos;
        }
        

    }

    

    public function buscar_curso($id_profesor){
        helper('cookie');
        helper('array');
        $profesorM = new profesorModelo();
            //$id_profesor=$this->id_profesor();
    
            $cursos=$profesorM->buscar_cursos($id_profesor);
            //$datos['profesorDatos']=$this->recuperar_cookie();
            if($cursos!=null){
                $datos['cursos']=$cursos;
                
               // return view('cabecera').view('menuProfesor',$datos);
               return $cursos;
            }else{
                $datos['cursos']=null;
    
                //var_dump($datos['error']);die;
                return $cursos;
            }
        }


	public function validar_profesor(){

		$profesorM = new profesorModelo();	

		helper('cookie');
		helper('array');
		$mail = $this->request->getVar('inputEmail');
		
		$pswd = $this->request->getVar('inputPassword');
		//$pswd = sha1($this->input->post('inputPassword'));


		if($mail == null || $pswd==null){

			return view('cabeceraBasica').view('loginProfesor').view('campoNull');


		}else{ 						
			/*$r = $profesorM->prueba();
			var_dump($r);*/
			$profesor = $profesorM->profesor_login($mail,$pswd);
			
			if($profesor!= null){
				
				set_cookie($cookie='datosSesion',$valor=serialize($profesor),$expire=12000);

					/*$set_ookie = array(
						'name'   => 'datosSesion',
						'value'  =>serialize($profesor),                            
						'expire' => '12000',                                                                                   
						'secure' => FALSE
						);*/
						
                $datos['profesorDatos']=$profesor;
                $datos['cursos']=$this->buscar_cursos_y_alumnos($profesor->id_profesor);
				//var_dump($profesor);die;
					return view('cabecera').view('menuProfesor',$datos);
				

			}else{
			return view('cabeceraBasica').view('loginProfesor').view('ErrorLogin');

			
		}
	} 
}


    public function buscar_alumno(){
        helper('cookie');
		helper('array');
        $profesorM = new profesorModelo();	
        //var_dump("entra");die;
        $profesorDato = unserialize($this->request->getCookie('datosSesion'));
        $datos['profesorDatos']=$profesorDato;
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($profesorDato->id_profesor);
        $datos['cursos']=$this->buscar_curso($profesorDato->id_profesor);

        

        $nombreAlumno= $this->request->getVar('inputAlumno');
       // var_dump($datos);die;
        if($nombreAlumno!=null){
            $alumno= $profesorM->profesor_busca_alumno($nombreAlumno,$profesorDato->id_profesor);
            
            if($alumno!= NULL){
                $datos['datosAlumno']=$alumno;

               // var_dump($datos['cursos']);die;
               // var_dump($datos);die;
                return view('cabecera').view('menuProfesor',$datos);
            }else{
            //var_dump($datos);die;
                return view('cabecera').view('alumnoNoExiste').view('menuProfesor',$datos);
            }

        }else{
            return view('cabecera').view('menuProfesor',$datos).view('campoVacio');
        }
    }


    public function ver_curso(){
       
        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();

        $id_curso= $this->request->getVar('id_curso');

        $datosCurso =  $profesorM->seleccion_1_curso( $id_profesor,$id_curso);
        
        if($datosCurso!=null){
            $datos['datosCurso']=$datosCurso;
            return view('cabecera').view('menuProfesor',$datos);
        }else{
            $datos['id_curso']= $id_curso;
            $datos['error']='El curso está vacío porfavor agregue contenido';

            //var_dump($datos['error']);die;
            return view('cabecera',$datos).view('menuProfesor',$datos);
        }

    }

    public function vista_editar_curso(){
        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();

        $id_curso= $this->request->getVar('id_curso');
        $temaNombre= $this->request->getVar('inputTemaNombre');
        $datos['id_curso']=$id_curso;
            //var_dump("id_curso ".$id_curso);die;

        $temaInsertado =$profesorM->insert_tema($id_curso,$temaNombre);
        //var_dump($temaInsertado);die;
        $datos['id_tema']=$temaInsertado;
        
        //var_dump($temaInsertado);die;
        return view('editarCurso',$datos);
    }

    public function pruebaHTML(){
        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();
        
        $id_tema= $this->request->getVar('id_tema');
        $htmlTexto= $this->request->getVar('txt-content');
      //  var_dump($htmlTexto." y ".$id_curso);die;
        $datos['htmlTexto']=$htmlTexto;

       // var_dump($id_curso);die;

        $insertHTML=$profesorM->insertar_recurso_html($id_tema,$htmlTexto);
        //var_dump($insertHTML);die;
        if($insertHTML!=null){
            $datos['error']='Se ha guardado correctamente el tema';

            //var_dump($datos['error']);die;
            return view('cabecera').view('menuProfesor',$datos);
        }else{
            $datos['error']='NO se ha guardado el tema';

            //var_dump($datos['error']);die;
            return view('cabecera').view('menuProfesor',$datos);

        }
    }






}
    
