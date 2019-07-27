<?php

class CredencialesModel extends Model{

	function __construct(){
		parent::__construct();
	}

	function insertCredencial($datos){

		try{

			$query = $this->db->connect()->prepare('INSERT INTO credenciales(rutaFoto,firma,idAlumno) VALUES(:rutaFoto,:firma,:idAlumno)');

			$query->execute(['rutaFoto' => $datos['rutaFoto'],
							 'firma' => $datos['firma'],
							 'idAlumno' => $datos['idAlumno']]);

			return true;

		}catch(PDOException $e){
			return false;
		}

	}


	function getIdAlumno($matricula){

		try{

			$query = $this->db->connect()->prepare('SELECT idAlumno FROM alumnos WHERE matricula=:matricula');
			$query->execute(['matricula' => $matricula]);

			while ($row = $query->fetch()) {

				$idAlumno = $row['idAlumno'];
			}

			return $idAlumno;

		}catch(PDOException $e){
			return false;
		}
	}

}

?>