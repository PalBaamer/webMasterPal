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
		return view('cabecera',$datos).view('menuProfesor',$datos).view('pie');
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

			return view('cabeceraBasica').view('loginProfesor').view('campoNull').view('pie');


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
					return view('cabecera',$datos).view('menuProfesor',$datos).view('pie');
				

			}else{
			return view('cabeceraBasica').view('loginProfesor').view('ErrorLogin').view('pie');

			
		}
	} 
}

public function crearCurso(){
    helper('cookie');
		helper('array');
        $profesorM = new profesorModelo();
        $profesorDato = unserialize($this->request->getCookie('datosSesion'));
        $datos['profesorDatos']=$profesorDato;
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($profesorDato->id_profesor);
        $datos['cursos']=$this->buscar_curso($profesorDato->id_profesor);


        $id_profesor = $this->id_profesor();
        $curso = $this->request->getVar('inputEmail');
        $tema = $this->request->getVar('inputEmail');


        if($curso==null || $tema==null){
            $datos['error']='Los campos no pueden estar vacíos';

            //var_dump($datos['error']);die;
            return view('cabecera',$datos).view('menuProfesor',$datos).view('pie');
        }else{
            

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
                return view('cabecera',$datos).view('menuProfesor',$datos);
            }else{
            //var_dump($datos);die;
                return view('cabecera',$datos).view('alumnoNoExiste').view('menuProfesor',$datos).view('pie');
            }

        }else{
            return view('cabecera',$datos).view('menuProfesor',$datos).view('campoVacio').view('pie');
        }
    }


    public function ver_curso(){
       
        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();

        $id_curso= $this->request->getVar('id_curso');
        $nombre_curso = $profesorM->buscar_cursoID($id_curso);
        $datosCurso =  $profesorM->seleccion_1_curso( $id_profesor,$id_curso);
        
        if($datosCurso!=null){
            $datos['datosCurso']=$datosCurso;
            return view('cabecera').view('menuProfesor',$datos);
        }else{
            $datos['id_curso']= $id_curso;
            $datos['nombre_curso']= $nombre_curso[0]->nombre;
            $datos['error']='El curso está vacío porfavor agregue contenido';

            //var_dump($datos['error']);die;
            return view('cabecera',$datos).view('menuProfesor',$datos).view('pie');
        }

    }


    public function crear_curso(){

        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();

        $nombreCurso= $this->request->getVar('inputInsertCurso');
        $temaNombre= $this->request->getVar('inputInsertTema');
        
        $existe_curso=$profesorM->buscar_curso($nombreCurso);
     
        if($existe_curso==null){
            $id_Curso=$profesorM->insert_curso($nombreCurso,$id_profesor);
            $datos['id_curso']=$id_Curso;
            $datos['temaNombre']=$temaNombre;

        
            //var_dump($temaInsertado);die;
            return view('editarCurso',$datos);

        }else{
            $datos['error']='El curso introducido ya está creado';

            //var_dump($datos['error']);die;
            return view('cabecera',$datos).view('menuProfesor',$datos).view('pie');
        }



    } public function addTema(){

        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();

        $id_curso= $this->request->getVar('inputCurso');
        $temaNombre= $this->request->getVar('inputInsertTema');
        //var_dump($id_curso." y ".$temaNombre);die;
        $datos['id_curso']=$id_curso;
        $datos['temaNombre']=$temaNombre;
        
        return view('editarCurso',$datos);


    }



    public function insertarHTML(){
        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();
        
        $id_curso= $this->request->getVar('id_curso');
        $temaNombre=$this->request->getVar('temaNombre');
        $htmlTexto= $this->request->getVar('txt-content');
      // var_dump($htmlTexto." el id del tema es : ".$id_curso." - nombre del tema :".$temaNombre);die;
        $datos['htmlTexto']=$htmlTexto;

       // var_dump($id_curso);die;

        $insertHTML=$profesorM->insertar_tema($id_curso,$temaNombre,$htmlTexto);
        //var_dump($insertHTML);die;
        if($insertHTML!=null){
            $datos['error']='El tema se ha guardado correctamente';
            
            //var_dump($datos['error']);die;
            return view('cabecera').view('menuProfesor',$datos).view('pie');
        }else{
            $datos['error']='NO se ha guardado el tema';

//---------------SI EL CURSO NO TIENE TEMAS, ENTONCES ESTE, SE BORRARÁ(HAZLO)

            //$profesorM->borrar_tema($id_curso);

            //var_dump($datos['error']);die;
            return view('cabecera',$datos).view('menuProfesor',$datos).view('pie');

        }
    }

    public function verTema(){
        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();
        
        $id_tema= $this->request->getVar('id_tema');
        
        return view('cabecera',$datos).view('prueba',$datos).view('pie');
    }

    public function borrarTema(){
        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();
        
        $id_tema= $this->request->getVar('id_tema');

        $temaBorrado= $profesorM->borrar_tema($id_tema);

        if($temaBorrado!=null){
            $datos['error']='El tema se ha borrado correctamente';
            return view('cabecera',$datos).view('menuProfesor',$datos).view('pie');

        }else{
        $datos['error']='Ha ocurrido un error al borrar el tena, intentalo en unos minutos o contacta con el administrador del servicio.';

            //var_dump($datos['error']);die;
            return view('cabecera').view('menuProfesor',$datos).view('pie');
        }
    }



    
    public function vista_editar_curso(){
        
        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();

        $id_curso= $this->request->getVar('inputInsertCurso');
        $temaNombre= $this->request->getVar('inputInsertTema');
        $datos['id_curso']=$id_curso;
            //var_dump("id_curso ".$id_curso);die;
        
        $temaInsertado =$profesorM->insert_tema($id_curso,$temaNombre);
        
        //var_dump($temaInsertado);die;
        if($temaInsertado!=null){
            $datos['id_tema']=$temaInsertado;
        
            //var_dump($temaInsertado);die;
            return view('editarCurso',$datos);
        }else{
            
            $datos['error']='Ha ocurrido un error al guardar el Curso, intentalo en unos minutos o contacta con el administrador del servicio.';

            //var_dump($datos['error']);die;
            return view('cabecera').view('menuProfesor',$datos).view('pie');
        }
    }


}
    
