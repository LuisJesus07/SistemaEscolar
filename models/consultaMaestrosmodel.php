<?php

include_once 'models/maestro.php';

class ConsultaMaestrosModel extends Model{

	function __construct(){
		parent::__construct();
	}



	function getAll(){

		$maestros = [];

		try{

			$query = $this->db->connect()->query('SELECT * FROM profesores');

			while($row = $query->fetch()){
				$maestro = new Maestro();

				$maestro->matricula = $row['matricula'];
				$maestro->nombre = $row['nombre'];
				$maestro->apellidos = $row['apellidos'];
				$maestro->direccion = $row['direccion'];
				$maestro->telefono = $row['telefono'];
				$maestro->nacimiento = $row['nacimiento'];
				$maestro->sexo = $row['idSexo'];

				array_push($maestros, $maestro);
			}

			return $maestros;

		}catch(PDOException $e){
			return [];
		}
	}


	function getById($matricula){

		try{

			$query = $this->db->connect()->prepare('SELECT * FROM profesores WHERE matricula=:matricula');

			$query->execute(['matricula' =>$matricula]);

			while($row = $query->fetch()){

				$maestro = new Maestro();

				$maestro->matricula = $row['matricula'];
				$maestro->nombre = $row['nombre'];
				$maestro->apellidos = $row['apellidos'];
				$maestro->direccion = $row['direccion'];
				$maestro->telefono = $row['telefono'];
				$maestro->nacimiento = $row['nacimiento'];
				$maestro->sexo = $row['idSexo'];
			}

			return $maestro;

		}catch(PDOException $e){

			return null;
		}



	}



	function updateMaestro($datos){


		try{

			$query = $this->db->connect()->prepare('UPDATE profesores SET nombre=:nombre,apellidos=:apellidos,direccion=:direccion,telefono=:telefono,nacimiento=:nacimiento,idSexo=:sexo WHERE matricula=:matricula');

			$query->execute(['matricula' => $datos['matricula'],
							 'nombre' => $datos['nombre'],
							 'apellidos' => $datos['apellidos'],
							 'direccion' => $datos['direccion'],
							 'telefono' => $datos['telefono'],
							 'nacimiento' => $datos['nacimiento'],
							 'sexo' => $datos['sexo']]);

			return true;

		}catch(PDOException $e){

			print_r('Error connection: '. $e->getMessage()); 
		}

	}


	function deleteMaestro($matricula){

		try{

			$query = $this->db->connect()->prepare('DELETE FROM profesores WHERE matricula=:matricula');

			$query->execute(['matricula' => $matricula]);

			return true;

		}catch(PDOException $e){
			return false;
		}

	}



}

?>