<?php

namespace app;

class App
{
	public function boot()
	{
		$url = isset($_GET['url']) ? explode('/',$_GET['url'])[0] : 'home';
		$url = ucfirst($url);//transformando a primeira letra em maiúscula
		$url.='Controller';//concantenando string
		$path = '\Controllers\\'; 
		
		if  (!file_exists('Controllers/'.$url.'.php')){
			
			$url = 'HomeController';
		}

		$prefix = $path.$url;
		$c = new $prefix();
		$c->index();
	}	
}