<?php

namespace Controllers;

use app\Controller;

class ContatoController extends Controller
{
	public function index()
	{
		$data = array();

		$this->loadTemplate('contato',$data);
	}
}