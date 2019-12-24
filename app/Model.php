<?php 
namespace app;

abstract class Model
{	
	protected $pdo;
	protected $table;
	protected $id_user;

	public function __construct()
	{
		try {
			$pdo = new \PDO('mysql:dbname='.DB.';localhost='.HOST.';charset=utf8',USER,PASS,
				array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$this->pdo = $pdo;
		} catch(\PDOException $e) {
			echo "Erro de conexão".$e->getMessage();
		}
	}

	public function listAll(string $table):array
	{
		$sql = $this->pdo->prepare("SELECT * FROM {$table}");
		$sql->execute();

		if ($sql->rowCount() >0) {
			return $sql->fetchAll(\PDO::FETCH_OBJ);
		}
	}

	public function listOne(string $table, string $id_user, int $id): object
	{
		$sql = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$id_user} = {$id}");
		$sql->execute();

		if ($sql->rowCount() >0) {
			return $sql->fetch(\PDO::FETCH_OBJ);
		}
	}

	public function delete(string $table,string $id_user, int $id): void
	{
		$sql = $this->pdo->prepare("DELETE FROM {$table} WHERE {$id_user} = :{$id_user}");
		$sql->bindParam(":{$id_user}",$id);
		$sql->execute();
	}

	public function update(string $table, array $array = array(), string $id_user, int $id) : bool
	{	
		$sql = "UPDATE {$table} ".$this->treatment($array,$id_user,$id);
		$query = $this->pdo->prepare($sql);
		$bool = $query->execute();

		if ($bool) {
			return true;
		}
	}

	private function param($array,$query)
	{	
		$count = 0;
		$indice = array_keys($array);
			foreach ($array as $key ) {
				if ($count < count($array)) {
					$query->bindValue(":{$indice[$count]}",$key);
					$count++;
				}	
			}
		return $query->execute();
	}

	private function params($array,$sql)
	{	$count = 2;
		$sql .= " VALUES (";
		foreach ($array as $key =>$value) {
			if ($count <= count($array)) {
				$sql .= ":{$key},";
				$count++;
			} else {
				$sql .= ":{$key}";
			}	
		}
		$sql.=")";
		return $sql;
		
	}

	private function treatment(array $array, $id_user, $id) 
	{
		$count = 1;
		if (empty ($id)) {
			 $sql =" (";
		
				foreach ($array as $key => $value) {
			
					if ($count < count($array)) {
						$sql .= $key.',';
						$count++;	
					} else {
						$sql .= $key;
					}
			
				}
			$sql .= ")";

			return $this->params($array,$sql);

		} else {
			$sql = "SET ";
			foreach ($array as $key => $value) {
			
					if ($count < count($array)) {
						$sql .= $key." = '".$value."',";
						$count++;	
					} else {
						$sql .= $key." = '".$value."'";
					}
			
			}
				$sql .= " WHERE {$id_user} = ".$id;  
			return $sql;
		}	
	}

	public function insert(string $table, array $array = array()): int
	{	
		$sql = "INSERT INTO {$table}" . $this->treatment($array,$id_user="",$id="");
		$query = $this->pdo->prepare($sql);
		$this->param($array,$query);

		return $this->pdo->lastInsertId();	 
	}

}