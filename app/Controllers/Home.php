<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;


class home extends BaseController{


	public function index(){

		return view('cabeceraBasica').view('inicio');

	}

	
	public function cerrarSesion(){
		return view('cabeceraBasica').view('inicio');
		helper('cookie');
		delete_cookie('datosSesion');
	}
	
	public function imagen(){
		$imagenA =\Config\Services::image()->withFile('img/color.png');
		return view('cabeceraBasica/imagenA');

	}

	
	//--------------------------------------------------------------------

}
