<?php namespace App\Controllers;

use App\Models\alumnoModelo;
use App\Models\cursoModelo;
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
                $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($profesor->id_profesor);
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

        $temas =$profesorM->obtener_temas_examen($id_curso);
        
        if($temas!=null){
            $datos['nombre_curso']= $nombre_curso;
            $datos['id_curso']= $id_curso;
            $datos['datosCurso']=$temas;
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
        $pswd= $this->request->getVar('pswd');
        if($nombreCurso!=null || $temaNombre!=null){
            $existe_curso=$profesorM->buscar_curso($nombreCurso);
     
            if($existe_curso==null){
                $id_Curso=$profesorM->insert_curso($nombreCurso,$id_profesor,$pswd);
                $datos['id_curso']=$id_Curso;
                $datos['temaNombre']=$temaNombre;
    
            
                //var_dump($temaInsertado);die;
                return view('editarCurso',$datos);
    
            }else{
                $datos['error']='El curso introducido ya está creado';
    
                //var_dump($datos['error']);die;
                return view('cabecera',$datos).view('menuProfesor',$datos).view('pie');
            }
        }else{
            $datos['error']='Han de estar cumplimentados ambos datos';
    
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
        $datos['id_curso']=$id_curso;
        $datos['temaNombre']=$temaNombre;
        
       // var_dump($id_curso." y ".$temaNombre);die;
        return view('cabecera',$datos).view('editarCurso',$datos).view('pie');


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
        //$datos['htmlTexto']=$htmlTexto;

       //var_dump(" El id del curso es :".$id_curso." - ".$temaNombre." y ".$htmlTexto);die;

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

    public function ver_tema(){
        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();
        $cursoM = new cursoModelo();
        
        $id_tema= $this->request->getVar('id_tema');
       
        $cuerpoTema =$cursoM->ver_tema($id_tema);
        //var_dump($cuerpoTema);die;
        if($cuerpoTema!=null){
            //var_dump("ENTRA");die;
            $datos['tema']=$cuerpoTema[0];
            return view('cabecera',$datos).view('prueba',$datos).view('pie');

            
        }else{
            $datos['error']='No se ha encontrado el tema ';
            return view('cabecera',$datos).view('menuProfesor',$datos).view('pie');

        }
        
    }

    public function editar_tema(){
        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();
        
        $id_tema= $this->request->getVar('id_tema');

        $cuerpoTema =$profesorM->ver_tema($id_tema);

        if($cuerpoTema!=null){
            $datos['tema']=$cuerpoTema;
            return view('cabecera',$datos).view('editarCurso',$datos).view('pie');

            
        }else{
            $datos['error']='No se ha encontrado el tema ';
            return view('cabecera',$datos).view('menuProfesor',$datos).view('pie');

        }
        
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
        $ejemplo="Inserta aquí tu tema";
        $datos['tema']=$ejemplo;
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

    public function crear_examen(){
        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();

        $id_tema = $this->request->getVar('id_tema');
        $hora = $this->request->getVar('tiempo_hora');
        $minutos = $this->request->getVar('tiempo_minutos');
        $sinTiempo = $this->request->getVar('noTiempo');
        $notaMinima = $this->request->getVar('notaMinima');
        $notaMaxima = $this->request->getVar('notaMaxima');
        $nPreguntas = $this->request->getVar('nPreguntas');
        

        if($sinTiempo!="si"){
            $tiempo =$hora.":".$minutos.":00";
        }else{
            $tiempo ="00:00:00";
        }
        //var_dump($tiempo);die;
        $id_examen = $profesorM ->insertar_examen($id_tema,$tiempo,$notaMinima,$notaMaxima);
 
        if($id_examen!=null){
            $datos['id_examen']=$id_examen;
            $datos['notaMaxima']=$notaMaxima;
            $datos['notaMinima']=$notaMinima;
            $datos['nPreguntas']=$nPreguntas;
            return view('cabecera').view('crearPreguntasExamen',$datos).view('pie');

        }else{

            $datos['error']='Ha ocurrido un error al guardar el examen, intentalo en unos minutos o contacta con el administrador del servicio.';

            //var_dump($datos['error']);die;
            return view('cabecera').view('menuProfesor',$datos).view('pie');

        }
    }



        public function guardar_preguntas(){
        $id_profesor=$this->id_profesor();
        $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
        $datos['cursos']=$this->buscar_curso($id_profesor);
        $datos['profesorDatos']=$this->recuperar_cookie();
        $profesorM = new profesorModelo();
        $id_examen = $this->request->getVar('id_examen');
        $n_preguntas = $this->request->getVar('n_preguntas');
            for ($i=0; $i <$n_preguntas ; $i++) { 
        
                $pregunta = $this->request->getVar('pregunta_'.$i);
                $respuestaD = $this->request->getVar('respuestaD_'.$i);
                $respuestaA = $this->request->getVar('respuestaA_'.$i);
                $respuestaB = $this->request->getVar('respuestaB_'.$i);
                $respuestaC = $this->request->getVar('respuestaC_'.$i);
                $nota = $this->request->getVar('nota_'.$i);


                //var_dump($id_examen." -- ".$pregunta." -- ". $respuestaD." -- ". $respuestaA." -- ".$respuestaB." -- ".$respuestaB." -- ". $nota);die;
                if(strpos($pregunta, "'")){
                   // var_dump(str_replace("'", "\'",$pregunta));die;
                   $pregunta=str_replace("'", "\'",$pregunta);
                }
                if(strpos($respuestaD, "'")){
                    $respuestaD=str_replace("'", "\'",$respuestaD);
                 }
                 if(strpos($respuestaA, "'")){
                    $respuestaA=str_replace("'", "\'",$respuestaA);
                 }
                 if(strpos($respuestaB, "'")){
                    $respuestaB=str_replace("'", "\'",$respuestaB);
                 }
                 if(strpos($respuestaC, "'")){
                    $respuestaC=str_replace("'", "\'",$respuestaC);
                 }


                // var_dump(str_replace("'", "\'",$respuestaC));die;



                $id_preguntas = $profesorM->crear_pregunta($id_examen, $pregunta,$respuestaD,$respuestaA,$respuestaB,$respuestaC,$nota);
                //var_dump($id_preguntas);die;
                if($id_preguntas!=0){
                 
                   // var_dump("Ha habido un error");die;
                    $datos['error']='Ha ocurrido un error al guardar la pregunta, intentalo en unos minutos o contacta con el administrador del servicio.';

                    //var_dump($datos['error']);die;
                    return view('cabecera').view('menuProfesor',$datos).view('pie');

                }else{
                    var_dump("SE HA PARADO AL GRABAR 1 PREGUNTA");
                }
            }

                     // var_dump("ENTRA save");die;
                    $datos['error']='La pregunta ha sido guardada correctamente';
                    return view('cabecera').view('menuProfesor',$datos).view('pie');
            
        }

        public function ver_examen(){
            $id_profesor=$this->id_profesor();
            $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
            $datos['cursos']=$this->buscar_curso($id_profesor);
            $datos['profesorDatos']=$this->recuperar_cookie();
            $profesorM = new profesorModelo();
            $id_examen = $this->request->getVar('id_examen');
            $nombreTema = $this->request->getVar('nombre');
           
            $preguntas =$profesorM->preguntas_tema($id_examen);
            $examen = $profesorM->examen($id_examen);
           

           //var_dump($respuestasM);die;
        if($preguntas!=null){
            //var_dump($nombreTema);die;
            //var_dump($examen);die;
            $datos['preguntas']=$preguntas;
            $datos['nombreTema']=$nombreTema;
            $datos['examen']=$examen[0];
            //$datos['respuestas']=$respuestasM;
            //var_dump("NOMBRE DEL TEMA :".$datos['nombreTema']." examen ->".$examen."       y PREGUNTAS    ->". $datos['preguntas']);die;
            return view('cabecera',$datos).view('examen',$datos).view('pie');

            
        }else{
            $datos['error']='No se ha encontrado el examen ';
            return view('cabecera',$datos).view('menuProfesor',$datos).view('pie');

        }
        

        }

        public function borrar_examen(){
            $id_profesor=$this->id_profesor();
            $datos['cursoAlumnos']=$this->buscar_cursos_y_alumnos($id_profesor);
            $datos['cursos']=$this->buscar_curso($id_profesor);
            $datos['profesorDatos']=$this->recuperar_cookie();
            $profesorM = new profesorModelo();
            $id_examen = $this->request->getVar('id_examen');
            //var_dump($id_examen);die;
            $examen =$profesorM->examen_borrar($id_examen);
            if($examen!=null){
                $datos['error']='El tema se ha borrado correctamente';
                return view('cabecera',$datos).view('menuProfesor',$datos).view('pie');
    
            }else{
            $datos['error']='Ha ocurrido un error al borrar el tena, intentalo en unos minutos o contacta con el administrador del servicio.';
    
                //var_dump($datos['error']);die;
                return view('cabecera').view('menuProfesor',$datos).view('pie');
            }

        }

        
      







    


}
    
