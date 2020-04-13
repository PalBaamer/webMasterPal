<?php namespace App\Controllers;

use App\Models\alumnoModelo;
use CodeIgniter\Controller;

class loginAlumno extends BaseController {

	public function index(){
		return view('cabeceraBasica').view('loginAlumno');
		
	}


	public function validarAlumno(){
		
		$alumnoM = new alumnoModelo();	

		helper('cookie');
		helper('array');
		$mail = $this->request->getVar('inputEmail');
		
		$pswd = $this->request->getVar('inputPassword');
		//$pswd = sha1($this->input->post('inputPassword'));


		if($mail == null || $pswd==null){

			return view('cabeceraBasica').view('loginAlumno').view('campoNull');


		}else{ 						
			/*$r = $profesorM->prueba();
			var_dump($r);*/
			$alumno = $alumnoM->alumnoLogin($mail,$pswd);
			
			if($alumno!= null){
				
				set_cookie($cookie='datosSesion',$valor=serialize($alumno),$expire=12000);

					/*$set_ookie = array(
						'name'   => 'datosSesion',
						'value'  =>serialize($profesor),                            
						'expire' => '12000',                                                                                   
						'secure' => FALSE
						);*/
						
				$datos['alumnoDatos']=$alumno;
				//var_dump($profesor);die;
					return view('cabecera').view('menuAlumno',$datos);
				

			}else{
			return view('cabeceraBasica').view('loginAlumno').view('ErrorLogin');

			
		}
	} 
}
}