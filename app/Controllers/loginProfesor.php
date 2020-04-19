<?php namespace App\Controllers;

use App\Models\alumnoModelo;
use App\Models\profesorModelo;
use CodeIgniter\Controller;


class loginProfesor extends BaseController{


	public function index(){
		
		return view('cabeceraBasica').view('loginProfesor');
	}
	public function imagen(){
		$imagenA =\Config\Services::image()->withFile('img/apagar.png');
		return view('cabecera/imagenA').view('cabecera');

	}



public function registro(){
	helper('array');
	$profesorM = new profesorModelo();	
	$listaProvincia = $profesorM->provincias();
	//echo $listaProvincia[0]->nombre, $listaProvincia[0]->id_provincia ;die;
          
	$datos['listaProvincia']=$listaProvincia;
	return view('cabeceraBasica').view('registro2',$datos);


}
public function registroUsuario(){
	helper('array');
	helper('cookie');

	$categoria = $this->request->getVar('inputCategoria');

	$usuario['nombre']=$this->request->getVar('inputNombre');

	$usuario['apellido']=$this->request->getVar('inputApellido');

	$usuario['apellido2']=$this->request->getVar('inputApellido2');

	$usuario['dni']=$this->request->getVar('inputDni');

	$usuario['direccion']=$this->request->getVar('inputDireccion');

	$usuario['provincia']=$this->request->getVar('inputProvincia');

	$usuario['telefono']=$this->request->getVar('inputTelefono');

	$usuario['email']=$this->request->getVar('inputEmail');

	$usuario['pswd']=$this->request->getVar('inputContrasena');

	if($categoria==0){
		
		$alumnoM = new alumnoModelo();	
		$alumnoInsertado= $alumnoM->insertar_alumno($usuario);
		
		 if($alumnoInsertado!=null){
			set_cookie($cookie='datosSesion',$valor=serialize($usuario),$expire=12000);
			$alumno = $alumnoM->alumnoLogin($usuario['email'],$usuario['pswd']);

			$datos['alumnoDatos']=$alumno;
			return view('cabecera').view('menuAlumno',$datos);
		 }
		 else{
			return view('cabeceraBasica').view('registro2').view('falloRegistro');
		 }
	}else{
		$profesorM = new profesorModelo();	
		$profesorInsertado= $profesorM->insertar_profesor($usuario);
		 if($profesorInsertado!=null){
			set_cookie($cookie='datosSesion',$valor=serialize($usuario),$expire=12000);
			$profesor = $profesorM->profesor_login($usuario['email'],$usuario['pswd']);

			$datos['profesorDatos']=$profesor;
			return view('cabecera').view('menuProfesor',$datos);
		 }
		 else{
			return view('cabeceraBasica').view('registro2').view('falloRegistro');
		 }
	}

}
}

