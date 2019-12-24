<?php 

namespace Controllers;

use app\Controller;
use Models\Usuario;

class EditController extends Controller 
{
	public function index()
	{
		$data = array();
		$usuario = new usuario;

		$id = filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT);

		if (isset($id) && !empty($id)) {
			$data['usuario'] = $usuario->one($id);
		}

		$id_usuario = filter_input(INPUT_POST, 'id_usuario',FILTER_VALIDATE_INT);
		$nome = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRIPPED);
		$email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRIPPED);

		if (isset($id) && !empty($id) && isset($nome) && !empty($nome) 
			&& isset($email) && !empty($email)) {
			$lista = [
						'nome' => $nome,
						'email'=> $email
					 ];

			$usuario->up($id,$lista);
			if ($usuario->up($id,$lista)) {
				header('Location:'.BASE_URL);
			}
		}

		$this->loadTemplate('edit',$data);
	}
}