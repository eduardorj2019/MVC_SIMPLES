<?php

namespace Controllers;

use app\Controller;
use Models\Usuario;

class HomeController extends Controller
{
	public function index()
	{
		$data = array();
		$usuario = new Usuario;
		$data['usuarios'] = $usuario->all();

		$nome = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRIPPED);
		$email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);

		if (isset($nome) && !empty($nome) && !empty($email) && !empty($email)) {
			$lista = [
						'nome' => $nome,
						'email'=> $email
					 ];

			if (!empty($usuario->save($lista))) {

				header('Location:'.BASE_URL);	
			}
		}

		$this->loadTemplate('home',$data);
	}

}