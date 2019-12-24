<?php

namespace Controllers;

use app\Controller;
use Models\Usuario;

class DeleteController extends Controller 
{
	public function index()
	{
		$data = array();
		$usuario = new Usuario;

		$id = filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT);

		if (isset($id) && !empty($id)) {

			$usuario->destroy($id);

			header('Location:'.BASE_URL);
		}
	}
}		