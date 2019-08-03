<?php

class CorreosModel extends Model{

	function __construct(){
		parent::__construct();
	}

	function validarCorreo($correo){

		try{

			$query = $this->db->connect()->prepare('SELECT COUNT(correo) FROM correos WHERE correo=:correo');

			$query->execute(['correo' => $correo]);

			return $query->fetch()[0];

		}catch(PDOExeception $e){
			return false;
		}
	}

	function validarAlumnoCorreo($idAlumno){

		try{

			$query = $this->db->connect()->prepare('SELECT COUNT(correo) FROM correos WHERE idAlumno=:idAlumno');

			$query->execute(['idAlumno' => $idAlumno]);

			return $query->fetch()[0];

		}catch(PDOExeception $e){
			return false;
		}
	}


	function getIdAlumno($matricula){

		try{

			$query = $this->db->connect()->prepare('SELECT idAlumno FROM alumnos WHERE matricula=:matricula');

			$query->execute(['matricula' => $matricula]);

			return $query->fetch()[0];

		}catch(PDOExeception $e){
			return false;
		}
	}


	function insertCorreo($datos){


		try{
			
			$query = $this->db->connect()->prepare('INSERT INTO correos(correo,password,privilegios,idAlumno) VALUES(:correo, :password, :privilegios,:idAlumno)');

			$query->execute(['correo' => $datos['correo'],
							 'password' => $datos['password'],
							 'privilegios' => $datos['privilegios'],
							 'idAlumno' => $datos['idAlumno']]);

			return true;
			

		}catch(PDOExeception $e){
			return false;
		}

	}


}

?>