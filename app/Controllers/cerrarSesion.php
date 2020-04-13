<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class cerrarSesion extends BaseController {

	public function cerrarSesion(){
		return view('cabeceraBasica').view('inicio');
		helper('cookie');
		delete_cookie('datosSesion');
	}

	public function imagen(){
		$imagenA =\Config\Services::image()->withFile('img/color.png');
		return view('cabeceraBasica/imagenA');

	}
}
?>
