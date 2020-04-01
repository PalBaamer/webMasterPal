<?php

use App\Controllers\BaseController;
use App\Models\Alumno_modelo;

class Login_alumno extends BaseController {

	public function index(){
		$this->load->helper('array');
		$this->load->helper('url');
		$this->load->view('CabeceraBasica');
		$this->load->view('Login');
		$this->load->view('Pie');
		
	}
	public function validarUsuario(){
		$this->load->helper('cookie');

			$mail = $this->input->post('inputEmail');
			$pswd = sha1($this->input->post('inputPassword'));


	if($mail == null || $pswd==null){
		$this->load->view('CabeceraBasica');
		$this->load->view('Login');
		$this->load->view('CampoNull');
		$usuario=null;

	}else{
		$this->load->model('usuario_modelo');
		$usuario = $this->usuario_modelo->usuario_login($mail, $pswd);
		
		if($usuario ==null){
			$this->load->view('CabeceraBasica');
			$this->load->view('Login');
			$this->load->view('ErrorLogin');
			
		}else{
			$datos['usuario'] = $usuario;
		
			$cookie = array(
				'name'   => 'datosSesion',
				'value'  => serialize($usuario),                            
				'expire' => '12000',                                                                                   
				'secure' => FALSE
				);
				$this->input->set_cookie($cookie);
				
				$this->load->model('usuario_modelo');
				$id=$usuario->id_usuario;
				$historial= $this->usuario_modelo->hitorialCitas($id);
				$datos['historial']=$historial;
				$datos['sesionUsuario']=-1;
				$datos['id']=$id;
					//var_dump($id);die;

				$this->load->view('Cabecera',$datos);
				$this->load->view('MenuUsuario',$datos);
				$this->load->helper('array');
				$this->load->helper('url');
				$this->load->view('Pie');
				
		}
	}
}
	
}
    ?>