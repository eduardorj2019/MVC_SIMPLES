<?php

namespace Models;

use app\Model;

class Usuario extends Model
{	

	public function __construct()
	{	
		parent::__construct();
		$this->table = 'usuarios'; //tabela do banco de dados
		$this->id = 'id'; // id da tabela apena nome que esta no banco
	}

	/***
	**@param metodo para pegar todos 
	***/
	public function all() 
	{
		return $this->listAll($this->table);	
	}

	/***
	**@param metodo para salvar
	***/
	public function save($array)
	{
		if (!empty($array)) {
			return $this->insert($this->table,$array);
		}
	}

	/***
	**@param metodo para buscar pela chave primaria da tabela 
	***/
	public function one($id)
	{	
		return $this->listOne($this->table,$this->id,$id);	
	}	

	/***
	**@param metodo para alterar  
	***/
	public function up($id,$array)
	{
		return $this->update($this->table,$array,$this->id,$id);
	}

	/***
	**@param metodo para destruir os dados da tabela 
	***/
	public function destroy($id)
	{
		return $this->delete($this->table,$this->id,$id);
	}
}