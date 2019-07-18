<?php

class GeneracionesModel extends Model{

	function __construct(){
		parent::__construct();
	}


	function insertGeneracion($generacion){

		try{

			$query = $this->db->connect()->prepare('INSERT INTO generaciones(generacion) VALUES(:generacion)');

			$query->execute(['generacion' => $generacion]);

			return true;

		}catch(PDOException $e){
			return false;
		}
	}
}

?>