<?php

class MiCuentaModel extends Model{

	function __construct(){
		parent::__construct();
	}

	function verificarPasswordActual($datos){

		try{

			$query = $this->db->connect()->prepare('SELECT COUNT(correo) FROM correos WHERE correo=:correo AND password=:password');

			$query->execute(['correo' => $datos['correo'],
							 'password' => $datos['passwordActual']]);

			return $query->fetch()[0];

		}catch(PDOException $e){
			return false;
		}
	}

	function getIdAlumno($correo){

		try{

			$query = $this->db->connect()->prepare('SELECT ALU.idAlumno 
													FROM alumnos as ALU
													INNER JOIN correos AS CORR ON CORR.idAlumno=ALU.idAlumno
													WHERE correo=:correo');

			$query->execute(['correo' => $correo]);

			return $query->fetch()[0];

		}catch(PDOException $e){
			return false;
		}

	}


	function updatePassword($datos){

		try{

			$query = $this->db->connect()->prepare('UPDATE correos SET password=:password WHERE idAlumno=:idAlumno');

			$query->execute(['password' => $datos['password'],
							 'idAlumno' => $datos['idAlumno']]);

			return true;

		}catch(PDOException $e){
			return false;
		}

	}

}

?>