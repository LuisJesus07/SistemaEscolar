<?php

class MaestrosModel extends Model{

	function __construct(){
		parent::__construct();
	}


	function insertMaestro($datos){

		try{

			$query = $this->db->connect()->prepare('INSERT INTO profesores(matricula,nombre,apellidos,direccion,telefono,nacimiento,idSexo) VALUES(:matricula,:nombre,:apellidos,:direccion,:telefono,:nacimiento,:idSexo)');

			$query->execute(['matricula' => $datos['matricula'],
							 'nombre' => $datos['nombre'],
							 'apellidos' => $datos['apellidos'],
							 'direccion' => $datos['direccion'],
							 'telefono' => $datos['telefono'],
							 'nacimiento' => $datos['nacimiento'],
							 'idSexo' => $datos['sexo']]);

			return true;

		}catch(PDOException $e){

			//return false;
			print_r('Error connection: '. $e->getMessage());
		}

	}
}

?>